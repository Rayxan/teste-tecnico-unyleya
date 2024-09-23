<?php

namespace Database\Seeders;

use App\Models\Editora;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EditoraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $editoras = [
            ['nome' => 'Leya'],
            ['nome' => 'Harper'],
            ['nome' => 'Unyleya'],
            ['nome' => 'Marvel'],
            ['nome' => 'Rocco'],
            ['nome' => 'Penguin Random House'],
            ['nome' => 'Companhia das Letras'],
        ];

        foreach ($editoras as $editora) {
            Editora::create($editora);
        }
    }
}
