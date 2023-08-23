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
        Schema::create('users_niveautraitements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('idUser')->unsigned();
            $table->unsignedBiginteger('idNiveauTraitement')->unsigned();

            $table->foreign('idUser')->references('id')
                 ->on('users')->onDelete('cascade');
            $table->foreign('idNiveauTraitement')->references('id')
                ->on('niveauTraitements')->onDelete('cascade');

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
        Schema::dropIfExists('users_niveautraitements');
    }
};
