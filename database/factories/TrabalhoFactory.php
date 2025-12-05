<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TrabalhoFactory extends Factory
{
    public function definition(): array
    {
        // Força o idioma Português do Brasil
        $faker = \Faker\Factory::create('pt_BR');

        // Listas personalizadas para criar tarefas realistas
        $acoes = ['Comprar', 'Consertar', 'Limpar', 'Estudar', 'Vender', 'Organizar', 'Pagar', 'Agendar', 'Entregar', 'Revisar'];
        $complementos = ['o Carro', 'a Casa', 'o Computador', 'os Boletos', 'a Reunião', 'os Livros', 'as Roupas', 'o Projeto', 'a Documentação', 'o Cliente'];

        return [
            // Junta um verbo com um complemento (Ex: "Limpar a Casa")
            'name' => $faker->randomElement($acoes) . ' ' . $faker->randomElement($complementos),
            
            // realText() gera frases reais em português (não latim)
            'description' => $faker->realText(150),
            
            'is_done' => $faker->boolean(20), // 20% de chance de estar concluída
            'priority' => $faker->randomElement(['baixa', 'media', 'alta']),
            'due_date' => $faker->dateTimeBetween('now', '+30 days'),
            
            'created_at' => $faker->dateTimeBetween('-2 months', 'now'),
            'updated_at' => $faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}