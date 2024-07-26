<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoertuigenTable extends Migration
{
    public function up()
    {
        Schema::create('voertuigen', function (Blueprint $table) {
            $table->id();
            $table->string('kenteken')->unique();
            $table->string('merk');
            $table->string('type');
            $table->date('bouwdatum');
            $table->decimal('prijs_ingekocht', 8, 2);
            $table->decimal('prijs_te_koop', 8, 2);
            $table->string('categorie');
            $table->string('foto_path')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('voertuigen');
    }
}