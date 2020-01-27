<?php

namespace App\Listeners;

use Mail;
use App\Events\TaskCheckEvent;
use App\Notifications\TaskNotifications;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

// Models...
use App\Task;
use App\Teacher;

class TaskCheckListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  TaskCheckEvent  $event
     * @return void
     */
    public function handle(TaskCheckEvent $event)
    {
        $tasks = Task::all();
        foreach ($tasks as $task) 
        {
            $current_time = Carbon::now();
            $start_time = Carbon::parse($task->start_time);
            $send_time = $start_time->subMinutes($task->notify_before);
            if ($current_time >= $send_time && $task->status == 0) 
            {
                $task = Task::find($task->id);
                $task->status = 1;
                $task->update();

                $teacher = Teacher::find($task->teacher_id);
                
                $data = array(
                            'email'=>'saifultechie@gmail.com',
                            'subject'=>$task->title,
                            'bodyMessage'=>$task->description
                        );

                Mail::send('emails.contact',$data,function($message) use ($data, $task, $teacher)
                {

                    $message->to($teacher->email);
                    $message->subject('Reminder - '.$task->title.' | Start Time: '.$task->start_time.' | End Time: '.$task->end_time);
                    $message->from('mbstu@gmail.com');

                });
            }
        }
        
    }
}
