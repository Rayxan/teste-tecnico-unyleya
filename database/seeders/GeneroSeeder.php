<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = [
            ['nome' => 'Romance'],
            ['nome' => 'Fantasia'],
            ['nome' => 'Ficção Científica'],
            ['nome' => 'Terror'],
            ['nome' => 'Mistério'],
        ];

        foreach ($generos as $genero) {
            Genero::create($genero);
        }
    }
}
