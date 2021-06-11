<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOuverturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ouvertures', function (Blueprint $table) {
            $table->id();
            $table->text('nom');
            $table->text('premiersCoups');
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
        Schema::dropIfExists('ouvertures');
    }
}
