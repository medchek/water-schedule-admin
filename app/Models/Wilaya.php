<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ar_name',
        'code',
    ];

    public function towns()
    {
        return $this->hasMany(Town::class);
    }
}
