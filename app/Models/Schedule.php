<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\Period;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'code', // towncode.weeknumber.year combined
        'week_number',
        'next_week_number',
        'schedule',
        'created_by',
        'modified_by',
        'town_code'
        // 'period_id'
    ];

    /**
     * Associate the town with the waterSchedule
     * A period can only be refernced once within the WaterSchedule table
     * A town can be referenced many times WaterSchedule table
     */
    public function town()
    {
        return $this->belongsTo(Town::class);
    }
}
