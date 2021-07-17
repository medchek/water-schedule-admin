<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'year',
        'week_number',
        'week_start',
        'week_end',
        'town_id'
    ];


    public function town()
    {
        return $this->belongsTo(Town::class);
    }

    public function schedule()
    {
        return $this->hasOne(Schedule::class);
    }
}

/**
 * post id: 1,
 * comment id:1 post_id 1;
 * comment id:2 post_id 1;
 * comment id:3 post_id 1;
 * comment id:4 post_id 2;
 * comment id:5 post_id 1;
 * 
 */
