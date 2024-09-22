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
            ['titulo' => 'Senhor dos Anéis', 'ano_lancamento' => '1800', 'fk_autor'=>'1','fk_editora'=>'1','fk_genero'=>'1'],
        ];
        foreach ($livros as $key => $livro) {
            Livro::create($livro);
        }
    }
}
