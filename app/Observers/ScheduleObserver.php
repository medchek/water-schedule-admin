<?php

namespace App\Observers;

use App\Models\Schedule;
use App\Services\ScheduleService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ScheduleObserver
{

    public $afterCommit = true;

    /**
     * Handle the Schedule "created" event.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return void
     */
    public function created(Schedule $schedule)
    {
        $scheduleServices = new ScheduleService;
        $scheduleServices->deleteOldSchedules($schedule->town_code);
        Cache::forget("{$schedule->code}-schedule");
    }

    /**
     * Handle the Schedule "updated" event.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return void
     */
    public function updated(Schedule $schedule)
    {
        Cache::forget("{$schedule->code}-schedule");
    }
}
