<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cliente>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create('pt_BR');

        return [
            'user_id' => User::all()->random()->id,
            'nome' => $faker->name,
            'cpf' => $faker->cpf,
            'email' => $faker->safeEmail,
            'telefone' => '11 ' . $faker->cellPhone,
        ];
    }
}
