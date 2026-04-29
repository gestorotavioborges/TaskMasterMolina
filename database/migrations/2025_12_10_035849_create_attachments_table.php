<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            // Cria a ligação com a tabela trabalhos. Se apagar o trabalho, apaga o anexo junto (cascade)
            $table->foreignId('trabalho_id')->constrained('trabalhos')->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('attachments');
    }
};
