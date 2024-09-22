<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $table ='autores';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nome',
        'ano_nascimento',
        'sexo',
        'nacionalidade'
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class,'fk_autor','id');
    }
}
