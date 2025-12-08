<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Trabalho;

class CommentFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'content' => $faker->realText(50),
            // Pega um usuário e tarefa aleatórios ou cria novos
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'trabalho_id' => Trabalho::inRandomOrder()->first()?->id ?? Trabalho::factory(),
            'created_at' => $faker->dateTimeBetween('-1 month', 'now'),
        ];
    }
}