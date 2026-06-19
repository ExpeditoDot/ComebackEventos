<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('local');
            $table->dateTime('data');
            
            // --- ADICIONE ESTAS 3 LINHAS NOVAS AQUI EMBAIXO ---
            $table->decimal('preco_ingresso', 8, 2)->nullable(); // Guarda o preço (ex: 99.90)
            $table->text('descricao')->nullable();               // Guarda textos longos da descrição
            $table->string('image')->nullable();                 // Guarda o caminho da foto anexada
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('eventos');
    }
};
