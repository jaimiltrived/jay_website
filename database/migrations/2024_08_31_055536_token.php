<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('token')) {
            Schema::create('token', function (Blueprint $table) {
                $table->id();
                $table->string('email', 300);
                $table->time('s_time');
                $table->string('token', 300);
                $table->integer('otp');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
