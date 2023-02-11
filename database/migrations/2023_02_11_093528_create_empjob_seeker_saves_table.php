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
        Schema::create('empjob_seeker_save', function (Blueprint $table) {
            $table->integer('jobpost_id')->unsigned();
            $table->foreign('jobpost_id')
                ->references('id')
                ->on('cars')
                ->ondelete('cascade');

            $table->integer('jobsave_id')->unsigned();
            $table->foreign('jobsave_id')
                ->references('id')
                ->on('save')
                ->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empjob_seeker_saves');
    }
};