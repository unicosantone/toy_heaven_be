<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->integer('quantity');
            $table->string('name_ita');
            $table->string('name_eng');
            $table->integer('year')->nullable();
            $table->text('description_ita');
            $table->text('description_eng');
            $table->decimal('price', 10, 2);
            $table->unsignedBigInteger('condition_id')->nullable();
            $table->boolean('in_evidence')->default(false)->nullable();
            $table->timestamps();

            $table->foreign('condition_id')->references('id')->on('conditions');


        });
    }

    public function down():void
    {
        Schema::dropIfExists('products');
    }
};
