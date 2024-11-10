<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    // Mass assignable attributes
    protected $fillable = [
        'no_reservation',
        'status',
        'email',
        'reservation_date',
        'reservation_time',
        'confirmed_date'
    ];

    // Attributes that should be mutated to dates
    protected $dates = [
        'reservation_date',
        'confirmed_date',
        'created_at',
        'updated_at'
    ];
}
