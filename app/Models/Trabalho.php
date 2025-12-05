<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Trabalho extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'is_done',
        'priority',
        'due_date'
    ];

    protected $casts = [
        'is_done' => 'boolean',
        'due_date' => 'date'
    ];
}