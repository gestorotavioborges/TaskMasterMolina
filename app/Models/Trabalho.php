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
        'due_date',
        'category_id'
    ];

    protected $casts = [
        'is_done' => 'boolean',
        'due_date' => 'date'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Nova relação: Uma tarefa tem muitos comentários
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
