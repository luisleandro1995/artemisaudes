<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('depedencies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('city_id')->references('id')
            ->on('cities')
            ->onDelete('Cascade')
            ->onUPdate('Cascade');

            $table->foreign('faculty_id')->references('id')
            ->on('faculties')
            ->onDelete('Cascade')
            ->onUPdate('Cascade');

            
            $table->foreign('user_id')->references('id')
            ->on('faculties')
            ->onDelete('Cascade')
            ->onUPdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('depedencies');

    }
};
