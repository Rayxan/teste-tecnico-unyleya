<?php

use App\Models\Autor;
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
        Schema::create((new Autor())->getTable(), function (Blueprint $table): void {
            $table->id();
            $table->string('nome');
            $table->date('ano_nascimento');
            $table->string('sexo');
            $table->string('nacionalidade');
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
        Schema::dropIfExists((new Autor())->getTable());
    }
};
