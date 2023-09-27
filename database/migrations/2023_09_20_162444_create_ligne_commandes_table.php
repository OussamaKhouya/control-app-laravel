<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numero',false, true)->unique();
            $table->string('numpiece')->references('numpiece')->on('commandes');
            $table->string('designation')->nullable();
            $table->string('observation')->nullable();
            $table->float('quantite', 16,4,true);
            $table->float('quantite_partiel', 16,4,true)->nullable();
            $table->float('quantite_liv', 16,4,true)->nullable();
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
        Schema::dropIfExists('ligne_commandes');
    }
}
