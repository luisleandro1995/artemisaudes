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
        Schema::create('forms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('publication_date');
            $table->string('end_date');
            $table->string('state');
            $table->integer('habeas_data');

            $table->integer('user_id')->unsigned();
            $table->integer('dependency_id')->unsigned();
            $table->integer('work_space_id')->unsigned();

        $table->timestamps();


        $table->foreign('user_id')->references('id')
                                ->on('users')
                                ->onDelete('cascade')
                                ->onUpdate('cascade');

                                
        $table->foreign('dependency_id')->references('id')
                                     ->on('dependencies')
                                     ->onDelete('cascade')
                                     ->onUpdate('cascade');  


        $table->foreign('work_space_id')->references('id')
                                     ->on('workspaces')
                                     ->onDelete('cascade')
                                     ->onUpdate('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
 
    }
};
