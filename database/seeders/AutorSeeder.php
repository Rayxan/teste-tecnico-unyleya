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
                'sexo' => 'masculino',
                'nacionalidade' => 'Brasileiro'
            ],
            [
                'nome' => 'J.R.R. Tolkien', 
                'ano_nascimento' => '1892', 
                'sexo' => 'masculino',
                'nacionalidade' => 'Britânico'
            ],
            [
                'nome' => 'George R.R. Martin', 
                'ano_nascimento' => '1948', 
                'sexo' => 'masculino',
                'nacionalidade' => 'Americano'
            ],
            [
                'nome' => 'J.K. Rowling', 
                'ano_nascimento' => '1965', 
                'sexo' => 'feminino',
                'nacionalidade' => 'Britânica'
            ],
            [
                'nome' => 'Machado de Assis', 
                'ano_nascimento' => '1839', 
                'sexo' => 'masculino',
                'nacionalidade' => 'Brasileiro'
            ]
        ];

        foreach ($autores as $autor) {
            Autor::create($autor);
        }
    }
}
