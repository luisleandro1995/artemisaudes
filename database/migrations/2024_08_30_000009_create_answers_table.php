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
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text');
            $table->integer('form_id')->unsigned();
            $table->timestamps();

            $table->foreign('form_id')->references('id')
                                      ->on('forms')
                                      ->onDelete('Cascade')
                                      ->onUPdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');

    }
};
