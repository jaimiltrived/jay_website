<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hotel_contents', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->default('ABOUT US');
            $table->string('hotel_name');
            $table->text('description');
            $table->string('main_image')->nullable();
            $table->string('side_image')->nullable();
            // $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotel_contents');
    }
};