<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Comment;

class DeleteEmptyComments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'comments:delete-empty';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete comments with empty content fields';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deleted = Comment::whereNull('content')
                          ->orWhere('content', '')
                          ->delete();

        $this->info("Deleted {$deleted} empty comments.");
    }
}
