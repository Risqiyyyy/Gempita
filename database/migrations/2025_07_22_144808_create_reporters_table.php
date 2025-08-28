<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('reporters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('is_deleted')->nullable();
            $table->timestamps();
        });

        // Tambahkan kolom relasi di tabel posts
        Schema::table('posts', function (Blueprint $table) {
            if (!Schema::hasColumn('posts', 'reporter_id')) {
                $table->foreignId('reporter_id')->nullable()->constrained('reporters')->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropForeign(['reporter_id']);
            $table->dropColumn('reporter_id');
        });

        Schema::dropIfExists('reporters');
    }
};
