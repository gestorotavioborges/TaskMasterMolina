<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;

class TrabalhoFactory extends Factory
{
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        $acoes = ['Comprar', 'Consertar', 'Limpar', 'Estudar', 'Vender', 'Organizar', 'Pagar', 'Agendar', 'Entregar', 'Revisar'];
        $complementos = ['o Carro', 'a Casa', 'o Computador', 'os Boletos', 'a Reunião', 'os Livros', 'as Roupas', 'o Projeto', 'a Documentação', 'o Cliente'];

        return [
            'name' => $faker->randomElement($acoes) . ' ' . $faker->randomElement($complementos),
            'description' => $faker->realText(150),
            'is_done' => $faker->boolean(20),
            'priority' => $faker->randomElement(['baixa', 'media', 'alta']),
            'due_date' => $faker->dateTimeBetween('now', '+30 days'),
            
            // Pega uma categoria aleatória existente (ou cria se não tiver)
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),

            'created_at' => $faker->dateTimeBetween('-2 months', 'now'),
            'updated_at' => $faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}