<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    
    // Libera o salvamento desses campos
    protected $fillable = ['trabalho_id', 'file_name', 'file_path'];

    public function trabalho()
    {
        return $this->belongsTo(Trabalho::class);
    }
}
