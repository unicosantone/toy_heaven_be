<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up():void
    {
        Schema::create('shows', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description_ita');
            $table->text('description_eng');
            $table->string('link')->nullable();
            $table->timestamps();
            $table->unique(['name', 'start_date']);
        });

    }

    public function down():void
    {
        Schema::dropIfExists('shows');
    }
};
