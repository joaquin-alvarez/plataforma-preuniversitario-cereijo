<?php

namespace App\Listeners;

use App\Events\GradablePeriodOpened;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateStudentGrades
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(GradablePeriodOpened $event): void
    {
        dd($event);
    }
}
