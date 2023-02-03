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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('firstname')->default('unsigned');
            $table->string('midname')->default('unsigned');
            $table->string('lastname')->default('unsigned');
            $table->string('companyname')->default('unsigned');
            $table->string('phone')->default('unsigned');
            $table->string('address')->default('unsigned');
            $table->string('education')->default('unsigned');
            $table->enum('accounttype', ['employer', 'seeker', 'admin', 'unsigned'])->default('unsigned');

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
        Schema::dropIfExists('users');
    }
};