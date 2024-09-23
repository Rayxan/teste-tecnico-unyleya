<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(NacionalidadeSeeder::class);
        $this->call(AutorSeeder::class);
        $this->call(EditoraSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(LivroSeeder::class);
    }
}
