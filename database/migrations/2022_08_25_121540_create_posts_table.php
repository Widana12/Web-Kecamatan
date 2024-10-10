<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image');
            $table->longText('content');
            $table->foreignId('create_by');
            $table->smallInteger('isPublish')->default(0);
            $table->foreignId('publish_by')->nullable();
            $table->dateTime('publish_at')->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
