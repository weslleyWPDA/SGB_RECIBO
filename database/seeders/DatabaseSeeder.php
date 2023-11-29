<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\Usuario::factory(10)->create();

        \App\Models\Fazenda::create([
            'id' => '1',
            'name' => 'ADMINISTRAÇÃO',

        ]);
        \App\Models\Fazenda::create([
            'id' => '2',
            'name' => 'BARRA BONITA',

        ]);
        \App\Models\User::create([
            'name' => 'ADMIN',
            'password' => '$2y$10$SOb0z5rWW1rjyg.benufNekgFD7Z752H9xTAMT2WCgXHhoK0/afTK',
            'fazenda_id'=> '1',
            'admin' => '1',
        ]);
        \App\Models\User::create([
            'name' => 'WES',
            'password' => '$2y$10$SOb0z5rWW1rjyg.benufNekgFD7Z752H9xTAMT2WCgXHhoK0/afTK',
            'fazenda_id'=> '2',
            'admin' => null,
        ]);

    }
}
