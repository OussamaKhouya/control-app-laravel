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
        Schema::create('m_a_bcc', function (Blueprint $table) {
            $table->integer('a_bcc_num',false, true)->unique();
            $table->string('a_bcc_nupi')->references('bcc_nupi')->on('m_bcc');
            $table->string('a_bcc_lib')->nullable();
            $table->string('a_bcc_dep')->nullable();
            $table->float('a_bcc_qua', 16,4,true);
            $table->float('a_bcc_coe', 16,4,true);
            $table->float('a_bcc_boi', 16,4,true);
            $table->float('a_bcc_quch1', 16,4,true);
            $table->float('a_bcc_boch1', 16,4,true);
            $table->string('a_bcc_obs1')->nullable();
            $table->float('a_bcc_quch2', 16,4,true);
            $table->float('a_bcc_boch2', 16,4,true);
            $table->string('a_bcc_obs2')->nullable();

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
