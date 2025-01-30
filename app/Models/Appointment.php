<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = 'bookings'; // Correct Table Name

    protected $fillable = [
        'child_id',
        'hospital_id',
        'vaccination_date',
        'vaccination_time',
        'vaccine_type',
        'comment',
        'status',
        ]; 
}
