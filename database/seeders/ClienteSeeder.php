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
        $users = User::factory(50)->create();

        $users->each(function (User $user) {
            Cliente::factory()->create([
                'user_id' => $user->id,
                'nome' => fake()->name,
                'cpf' => fake()->cpf,
                'email' => fake()->safeEmail,
                'telefone' => '(11) ' . fake()->cellPhone,
            ]);
        });
    }
}
