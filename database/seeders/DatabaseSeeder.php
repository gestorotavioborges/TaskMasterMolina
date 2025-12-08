<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Trabalho;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Admin do Sistema',
            'email' => 'admin@email.com',
            'password' => bcrypt('12345678'),
        ]);

        Category::create(['name' => 'Trabalho', 'color' => 'primary']);
        Category::create(['name' => 'Pessoal', 'color' => 'success']);
        Category::create(['name' => 'Estudo', 'color' => 'warning']);
        Category::create(['name' => 'Saúde', 'color' => 'danger']);
        Category::create(['name' => 'Finanças', 'color' => 'info']);

        Trabalho::factory(50)->create();

        Comment::factory(100)->create();
    }
}

