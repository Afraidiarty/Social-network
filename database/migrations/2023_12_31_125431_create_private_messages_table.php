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
        Schema::create('private_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('receiver_id');
            $table->string('receiver_name');
            $table->string('receiver_id_image');
            $table->text('message');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
    
            // Foreign key constraints
            $table->foreign('sender_id')->references('id')->on('registrs');
            $table->foreign('receiver_id')->references('id')->on('registrs');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('private_messages');
    }
};
