<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->integer('author');
            $table->string('title');
            $table->string('description');
            $table->integer('id_dt');
            $table->integer('id_w');
            $table->float('dientich');
            $table->float('giaphong');
            $table->float('gianuoc');
            $table->float('giadien');
            $table->boolean('trangthai');
            $table->dateTime('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
