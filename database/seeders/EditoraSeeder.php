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
        ];
        foreach ($editoras as $key => $editora) {
            Editora::create($editora);
        }
    }
}
