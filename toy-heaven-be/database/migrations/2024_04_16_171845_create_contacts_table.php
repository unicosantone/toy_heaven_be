<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('label_ita');
            $table->string('label_eng');
            $table->text('value')->nullable();
            $table->string('link');
            $table->unsignedBigInteger('image_id')->nullable();
            $table->timestamps();

            $table->foreign('image_id')->references('id')->on('images');
        });
    }

    public function down():void
    {
        Schema::dropIfExists('contacts');
    }
};
