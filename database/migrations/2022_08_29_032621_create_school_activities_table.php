<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('school_activities', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('sub_name');
            $table->string('background');
            $table->longText('content');
            $table->smallInteger('isPublish')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('school_activities');
    }
};
