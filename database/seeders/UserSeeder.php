<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crear el usuario admin
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'),
        ]);
        $admin->roles()->attach(1); // Asignar el rol de 'admin'

        // Crear un usuario sin proyectos asignados (rol 'user')
        $user = User::create([
            'name' => 'User Without Project',
            'email' => 'user@example.com',
            'password' => Hash::make('password123'),
        ]);
        $user->roles()->attach(2); // Asignar el rol de 'user'

        // Crear dos usuarios con proyectos asignados (rol 'user')
        $client1 = User::create([
            'name' => 'Client 1',
            'email' => 'client1@example.com',
            'password' => Hash::make('password123'),
        ]);
        $client1->roles()->attach(2); // Asignar el rol de 'user'

        $client2 = User::create([
            'name' => 'Client 2',
            'email' => 'client2@example.com',
            'password' => Hash::make('password123'),
        ]);
        $client2->roles()->attach(2); // Asignar el rol de 'user'

        // Crear proyectos para estos dos usuarios
        $project1 = $client1->projects()->create([
            'name' => 'Project 1',
            'description' => 'Descripción del Proyecto 1',
            'location' => 'Ubicación 1',
            'square_meters' => 100,
            'type' => 'residential',
            'status' => 'in progress',
            'budget' => 100000,
            'start_date' => now(),
            'end_date' => now()->addMonths(6),
        ]);

        $project2 = $client2->projects()->create([
            'name' => 'Project 2',
            'description' => 'Descripción del Proyecto 2',
            'location' => 'Ubicación 2',
            'square_meters' => 150,
            'type' => 'commercial',
            'status' => 'in progress',
            'budget' => 150000,
            'start_date' => now(),
            'end_date' => now()->addMonths(8),
        ]);
    }
}
