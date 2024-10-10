<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->string('background');
            $table->string('address');
            $table->string('address_link');
            $table->string('email');
            $table->string('phone1');
            $table->string('phone2');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('contact');
    }
};
