<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('joueur_id');
            $table->foreign('joueur_id')
                ->references('id')
                ->on('joueurs')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->unsignedBigInteger('tournoi_id');
            $table->foreign('tournoi_id')
                ->references('id')
                ->on('tournois')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->text('score')->default(0);
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
        Schema::dropIfExists('participes');
    }
}
