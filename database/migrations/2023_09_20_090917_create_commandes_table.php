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
        Schema::create('m_bcc', function (Blueprint $table) {
            $table->string('bcc_nupi')->unique();
            $table->dateTime('bcc_dat')->nullable();
            $table->dateTime('bcc_dach1')->nullable();
            $table->dateTime('bcc_dach2')->nullable();
            $table->string('bcc_lcli')->nullable();//libelle client
            $table->string('bcc_lrep')->nullable();
            $table->string('bcc_lexp')->nullable();
            $table->string('bcc_veh')->nullable();
            $table->string('bcc_eta')->nullable();
            $table->boolean('bcc_val')->default(false);
            $table->string('bcc_usr_sai')->nullable();
            $table->string('bcc_usr_com')->nullable();
            $table->string('bcc_usr_con1')->nullable();
            $table->string('bcc_usr_con2')->nullable();
            $table->string('bcc_usr_sup')->nullable();
            $table->timestamps();

            $table->primary('bcc_nupi');

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
