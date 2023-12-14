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
        \App\Models\User::create([
            'name' => 'ADMIN',
            'password' => '$2y$10$AQC/PNazy7NgSqMLdMDkOOyIU2qMokbFcAic.j8m6E7bHqQSlOeoG',
            'fazenda_id' => '1',
            'admin' => '1',
        ]);
    }
}
