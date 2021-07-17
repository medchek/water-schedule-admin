<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Models\Period;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'sunday_from',
        'sunday_to',
        'monday_from',
        'monday_to',
        'tuesday_from',
        'tuesday_to',
        'wednesday_from',
        'wednesday_to',
        'thursday_from',
        'thursday_to',
        'friday_from',
        'friday_to',
        'saturday_from',
        'saturday_to',
        'period_id'
    ];

    /**
     * Associate the period with the waterSchedule
     * A period can only be refernced once within the WaterSchedule table
     */
    public function period()
    {
        return $this->hasOne(Period::class);
    }
}
