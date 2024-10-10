<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('opening_headmaster', function (Blueprint $table) {
            $table->id();
            $table->text('opening_content');
            $table->string('headmaster_image');
            $table->string('headmaster_name');
            $table->text('headmaster_content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opening_headmaster');
    }
};
