<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->string('numpiece')->unique();
            $table->primary('numpiece');
            $table->dateTime('date')->nullable();
            $table->string('client')->nullable();
            $table->string('etat')->nullable();
            $table->boolean('saisie')->default(false);
            $table->boolean('commercial')->default(false);
            $table->boolean('control1')->default(false);
            $table->boolean('control2')->default(false);
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
        Schema::dropIfExists('commandes');
    }
}
