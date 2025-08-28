<?php

use App\Models\SettingColor;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // public function up(): void
    // {
    //     Schema::create('setting_colors', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('color-primary');
    //         $table->string('color-secondary');
    //         $table->string('color-tertiary');
    //         $table->timestamps();
    //     });
    //     SettingColor::create(['color-primary' => '#1293e4', 'color-secondary' => '#1293e4', 'color-tertiary' => '#1293e4']);
    // }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('setting_colors');
    // }
};
