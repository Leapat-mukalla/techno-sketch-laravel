<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'start_time',
        'end_date',
        'end_time',
    ];

    // protected $casts = [
    //     'start_date' => 'date',
    //     'start_time' => 'time',
    //     'end_date' => 'date',
    //     'end_time' => 'time',
    // ];
}
