<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Livro extends Model
{
    use HasFactory;

    protected $table = 'livros';

    protected $primaryKey = 'id';

    protected $fillable = [
       'titulo',
       'data_lancamento',
       'fk_autor',
       'fk_editora',
       'fk_genero' 
    ];

    public function autores()
    {
        return $this->belongsTo(Autor::class, 'fk_autor', 'id');
    }

    public function editoras()
    {
        return $this->belongsTo(Editora::class, 'fk_editora','id');
    }

    public function generos()
    {
        return $this->belongsTo(Genero::class,'fk_genero','id');
    }
}
