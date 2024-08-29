<?php

namespace App\Livewire\Reserves;

use App\Livewire\Traits\Messages;
use App\Models\Borrow;
use App\Models\Reserve;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class IndexReserve extends Component
{
    use Messages;

    public $search;

    public function delete($id) {
        Reserve::find($id)->delete();
    }

    public function give_book(Reserve $reserve)
    {
        $this->clear_messages();

        try {
            Borrow::where('id', $reserve->id)->delete();
            Borrow::create([
                'return_date' => Carbon::now()->addWeeks(2),
                'late' => 0,
                'book_id' => $reserve->book->id,
                'librarian_id' => Auth::id(),
                'student_registration' => $reserve->student->registration,
            ]);
            $reserve->delete();
        } catch (Exception $e) {
            $this->setMessage(__('message.generic_error_message'), 'error');
            return;
        }

        $this->setMessage(__('message.generic_success_message'), 'success');
    }

    public function render()
    {
        return view('livewire.reserves.index-reserve', [
            'reserves' => Reserve::whereHas('book', function ($query) {
                $query->whereAny([
                    'title',
                    'cdd',
                    'sector',
                    'shelf',
                    'bookcase',
                    'avaliables',
                    'author_id',
                    'category_id',
                ], 'like', '%'. $this->search .'%');
            })->orWhereHas('student', function ($query) {
                $query->whereAny([
                    'registration',
                    'name',
                    'class',
                    'phone',
                    'birthday',
                ], 'like', '%'. $this->search .'%');
            })->orWhereAny([
                'id',
                'reserve_date',
                'student_registration',
                'book_id',
            ], 'like', '%'. $this->search .'%')->paginate(10),
        ])
            ->slot('content');
    }
}
