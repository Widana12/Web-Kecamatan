<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('general_setting', function (Blueprint $table) {
            $table->id();
            $table->string('meta_description');
            $table->string('meta_keywords');
            $table->string('meta_author');
            $table->string('modal_image');
            $table->string('modal_link');
            $table->tinyInteger('modal_active');
            $table->string('header_logo_white');
            $table->string('header_logo_black');
            $table->string('footer_logo');
            $table->text('footer_content');
            $table->string('facebook_link');
            $table->string('instagram_link');
            $table->string('youtube_link');
            $table->string('psb_name');
            $table->string('psb_link');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('general_setting');
    }
};
