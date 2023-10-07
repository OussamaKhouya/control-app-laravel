<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAndRenameFieldsInLigneCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ligne_commandes', function (Blueprint $table) {
            $table->renameColumn('observation','observation1');
            $table->renameColumn('quantite_partiel','quantite1');
            $table->renameColumn('quantite_liv','quantite2');
            $table->string('observation2')->after('observation')->nullable();
            $table->string('username1')->after('quantite_liv')->nullable();
            $table->string('username2')->after('username1')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ligne_commandes', function (Blueprint $table) {
            $table->dropColumn('observation2');
            $table->dropColumn('username1')->nullable();
            $table->dropColumn('username2')->nullable();
            $table->renameColumn('observation1','observation');
            $table->renameColumn('quantite1','quantite_partiel');
            $table->renameColumn('quantite2','quantite_liv');
        });
    }
}
