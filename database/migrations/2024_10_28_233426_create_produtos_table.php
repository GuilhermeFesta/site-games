<?php

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
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')
                  ->constrained('categorias')
                  ->onDelete('cascade'); // Define a chave estrangeira com cascade
            $table->string('prod_nome');
            $table->integer('prod_quantidade');
            $table->text('prod_descricao')->nullable();            
            $table->boolean('prod_ativo')->default(1);
            $table->string('imagem')->nullable();
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
        Schema::dropIfExists('produtos');
    }
};
