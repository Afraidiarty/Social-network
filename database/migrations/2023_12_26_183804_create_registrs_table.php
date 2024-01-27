<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('Following')->default(0);
            $table->integer('Followers')->default(0);
            $table->enum('role', ['User', 'Superstar Helper', 'Moderation', 'Administration', 'Developer Team'])->default('User');
            $table->string('id_image')->default('uploads/default.png');
            $table->integer('reg_time');
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
        Schema::dropIfExists('registrs');
    }
};
