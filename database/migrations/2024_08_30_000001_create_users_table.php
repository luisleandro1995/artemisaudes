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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
            $table->string('document_type');
            $table->string('document_number');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('state');
            $table->integer('user_type_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_type_id')->references('id')
                                        ->on('user_types')
                                        ->onDelete('Cascade')
                                        ->onUPdate('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');

    }
};
