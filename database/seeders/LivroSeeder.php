<?php

namespace Database\Seeders;

use App\Models\Livro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LivroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $livros = [
            [
                'titulo' => 'Senhor dos Anéis',
                'ano_lancamento' => '2024-04-21',
                'fk_autor' => '1',
                'fk_editora' => '1',
                'fk_genero' => '1'
            ],
            [
                'titulo' => 'O Hobbit',
                'ano_lancamento' => '2020-09-23',
                'fk_autor' => '1', 
                'fk_editora' => '2', 
                'fk_genero' => '2'  
            ],
            [
                'titulo' => 'Game of Thrones',
                'ano_lancamento' => '2000-06-23',
                'fk_autor' => '2', 
                'fk_editora' => '3',
                'fk_genero' => '3'
            ],
            [
                'titulo' => 'Harry Potter e a Pedra Filosofal',
                'ano_lancamento' => '2020-08-24',
                'fk_autor' => '3',
                'fk_editora' => '4',
                'fk_genero' => '4'
            ]
        ];

        foreach ($livros as $livro) {
            Livro::create($livro);
        }
    }
}
