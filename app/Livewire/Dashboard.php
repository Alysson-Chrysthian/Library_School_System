<?php

namespace App\Livewire;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Reserve;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $reserves = Reserve::all();
        $resreved_borrows = 0;

        foreach ($reserves as $reserve) {
            if (Borrow::where('book_id', $reserve->book_id)->exists()) {
                $resreved_borrows++;
            }
        }

        return view('livewire.dashboard',
        [
            'late_books' => count(Borrow::where('late', 1)->get()),
            'unvaliable_books' => count(Book::where('avaliables', 0)->get()),
            'reserved_borrows' => $resreved_borrows,
        ])
            ->slot('content');
    }
}
