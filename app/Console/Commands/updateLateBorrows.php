<?php

namespace App\Console\Commands;

use App\Models\Borrow;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class updateLateBorrows extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-late-borrows';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Atualizar livros atrasados';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $loans = Borrow::where('return_date', '<', Carbon::now());
        $loans->update([
            'late' => 1,
        ]);
    }
}
