<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'child_id',
        'hospital_id',
        'date_of_birth',
        'gender',
        'vaccination_status'
    ]; 
}
