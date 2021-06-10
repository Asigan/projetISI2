<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('joueur1_id');
            $table->foreign('joueur1_id')
                ->references('id')
                ->on('joueurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('joueur2_id');
            $table->foreign('joueur2_id')
                ->references('id')
                ->on('joueurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('ouverture_id');
            $table->foreign('ouverture_id')
                ->references('id')
                ->on('ouvertures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('parties');
    }
}
