<?php

// Created by RandulaM on 17-01-2025

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';
    // Specify the fillable attributes 
    protected $fillable = [
        'p_name',
        'p_address',
        'p_dob',
        'p_mobile',
    ];
}
