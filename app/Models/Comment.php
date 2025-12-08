<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'user_id', 'trabalho_id'];

    // Dono do comentário
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Tarefa do comentário
    public function trabalho()
    {
        return $this->belongsTo(Trabalho::class);
    }
}