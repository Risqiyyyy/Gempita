<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('image_metadata', function (Blueprint $table) {
            $table->id();

            $table->string('original_name')->nullable();
            $table->string('filename')->nullable();
            $table->string('url')->nullable();
            $table->string('thumb_url')->nullable();
            $table->string('comp_url')->nullable();
            $table->string('caption')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('image_metadata');
    }
};
