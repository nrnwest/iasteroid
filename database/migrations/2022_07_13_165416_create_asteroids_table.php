<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asteroids', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('referenced');
            $table->string('name');
            $table->double('speed');
            $table->boolean('hazardous')->default(0);
            $table->date('date');
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
        Schema::dropIfExists('asteroids');
    }
};
