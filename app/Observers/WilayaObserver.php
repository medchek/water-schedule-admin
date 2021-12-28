<?php

namespace App\Observers;

use App\Models\Wilaya;
use Illuminate\Support\Facades\Cache;

class WilayaObserver
{

    /**
     * Handle events after all transactions are committed.
     *
     * @var bool
     */
    public $afterCommit = true;

    /**
     * Handle the Wilaya "created" event.
     *
     * @param  \App\Models\Wilaya  $wilaya
     * @return void
     */
    public function created(Wilaya $wilaya)
    {
        Cache::forget("wilayas");
    }

    /**
     * Handle the Wilaya "updated" event.
     *
     * @param  \App\Models\Wilaya  $wilaya
     * @return void
     */
    public function updated(Wilaya $wilaya)
    {
        Cache::forget("wilayas");
    }
}
