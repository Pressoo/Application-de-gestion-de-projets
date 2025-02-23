<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Task;
use Carbon\Carbon;

class CheckTaskDueDates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tasks:check-due-dates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check task due dates and send notifications';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tasks = Task::where('due_date', Carbon::today())->get();

        foreach ($tasks as $task) {
               If ($task->assignee) {
               $task->sendDueNotification($task->assignee);
               }
        }

        $this->info('Task due date check completed successfully!');
    }
}
