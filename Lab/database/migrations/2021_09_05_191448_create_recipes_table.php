<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
          Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('description',50);
            $table->string('type',25);
            $table->integer('amount');
            $table->unsignedBigInteger('patient_id');
            $table->timestamps();

            $table->foreign('patient_id')
            ->references('id')
            ->on('patients')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
