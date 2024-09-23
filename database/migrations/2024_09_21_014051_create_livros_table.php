<?php

use App\Models\Autor;
use App\Models\Editora;
use App\Models\Genero;
use App\Models\Livro;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create((new Livro())->getTable(), function (Blueprint $table): void {
            $table->id();
            $table->string('titulo');
            $table->date('ano_lancamento');
            $table->unsignedBigInteger('fk_autor');
            $table->unsignedBigInteger('fk_editora');
            $table->unsignedBigInteger('fk_genero');

            $autor = new Autor();
            $editora = new Editora();
            $genero = new Genero();

            $table->foreign('fk_autor')
                ->references($autor->getKeyName())
                ->on($autor->getTable())
                ->onDelete('cascade');
            
            $table->foreign('fk_editora')
                ->references($editora->getKeyName())
                ->on($editora->getTable())
                ->onDelete('cascade');
            
            $table->foreign('fk_genero')
                ->references($genero->getKeyName())
                ->on($genero->getTable())
                ->onDelete('cascade');
    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists((new Livro())->getTable());
    }
};
