<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Trabalho; // Importante: Adicione essa linha
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cria um usuário fixo para você não precisar cadastrar toda vez
        User::factory()->create([
            'name' => 'Admin do Sistema',
            'email' => 'admin@email.com',
            'password' => bcrypt('12345678'), // Senha padrão
        ]);

        // 2. Cria 50 tarefas aleatórias usando a fábrica que configuramos
        Trabalho::factory(50)->create();
    }
}
