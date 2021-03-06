<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;

    protected $fillable = [
        'wilaya_id',
        'name',
        'ar_name',
        'code',
        'protected',
        'added_by',
        'modified_by'
    ];

    protected $casts = [
        'protected' => 'boolean'
    ];

    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class);
    }

    public function shedule()
    {
        return $this->hasMany(Schedule::class);
    }
}
// gdc wilaya_id 1
// gdc wilaya_id 