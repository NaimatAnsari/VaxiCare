<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'name',
        'date_of_birth',
        'gender',
        'vaccination_status'
    ]; 
}
