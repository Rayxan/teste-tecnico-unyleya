<?php

namespace Database\Seeders;

use App\Models\Autor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $autores = [
            [
                'nome' => 'Raylan', 
                'ano_nascimento' => '2000', 
                'sexo'=>'masculino',
                'nacionalidade'=>'Brasileiro'
            ],
        ];
        foreach ($autores as $key => $autor) {
            Autor::create($autor);
        }
    }
}
