<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoyagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vessel_id');
            $table->string('code')->unique();
            $table->dateTime('start')->nullable();
            $table->dateTime('end')->nullable();
            $table->enum('status', ['pending', 'ongoing', 'submitted']);
            $table->decimal('revenues', 8,2);
            $table->decimal('expenses', 8,2);
            $table->decimal('profit', 8,2);
            $table->foreign('vessel_id')->references('id')->on('vessels');
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
        Schema::dropIfExists('voyages');
    }
}
