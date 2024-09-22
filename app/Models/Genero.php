<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    use HasFactory;
    protected $table ='generos';

    protected $primaryKey = 'id';

    protected $fillable =[
        'nome'
    ];

    public function livros()
    {
        return $this->hasMany(Livro::class,'fk_genero','id');
    }
}
