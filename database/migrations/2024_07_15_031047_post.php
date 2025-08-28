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
            $table->string('title')->nullable();
            $table->longText('content');
            $table->text('gambar')->nullable();
            $table->text('image_caption')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status', ['private', 'schedule', 'public']);
            $table->string('headline')->nullable();
            $table->date('start_date')->nullable();
            $table->time('start_time')->nullable();
            $table->string('keyword')->nullable();
            $table->text('description')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
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
