<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agenda_models', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profissional_id')->nullable(false);
            $table->bigInteger('cliente_id')->nullable(false);
            $table->bigInteger('servico_id')->nullable(false);
            $table->date('data_hora')->nullable(false);
            $table->string('tipo_pagamento')->nullable(false);
            $table->decimal('valor',20)->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda_models');
    }
};
