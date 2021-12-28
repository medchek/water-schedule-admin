<?php

namespace App\Observers;

use App\Models\Town;
use Illuminate\Support\Facades\Cache;

class TownObserver
{

    public $afterCommit = true;
    /**
     * Handle the Town "created" event.
     *
     * @param  \App\Models\Town  $town
     * @return void
     */
    public function created(Town $town)
    {
        $wilayaCode = $town->wilaya_id;
        Cache::forget("{$wilayaCode}-towns");
    }

    /**
     * Handle the Town "updated" event.
     *
     * @param  \App\Models\Town  $town
     * @return void
     */
    public function updated(Town $town)
    {
        $wilayaCode = $town->wilaya_id;
        Cache::forget("{$wilayaCode}-towns");
    }

    /**
     * Handle the Town "deleted" event.
     *
     * @param  \App\Models\Town  $town
     * @return void
     */
    public function deleted(Town $town)
    {
        $wilayaCode = $town->wilaya_id;
        Cache::forget("{$wilayaCode}-towns");
    }
}
