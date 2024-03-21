<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('pt_BR');

        $users = User::factory(50)->create();

        $users->each(function (User $user) use ($faker) {
            Cliente::factory()->create([
                'user_id' => $user->id,
                'nome' => $faker->name,
                'cpf' => $faker->cpf,
                'email' => $faker->safeEmail,
                'telefone' => '(11) ' . $faker->cellPhone,
            ]);
        });
    }
}
