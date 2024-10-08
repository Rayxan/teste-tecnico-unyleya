<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nacionalidade extends Model
{
    use HasFactory;
    protected $table ='nacionalidades';

    public $timestamps = false;

    protected $primaryKey = 'id';

    protected $fillable =[
        'code',
        'name'
    ];
}
