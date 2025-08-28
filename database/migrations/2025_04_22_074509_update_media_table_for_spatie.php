<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('media', function (Blueprint $table) {
            // Drop old columns if they exist
            $columnsToDrop = ['facebook', 'instagram', 'tiktok', 'twitter', 'youtube'];
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('media', $column)) {
                    $table->dropColumn($column);
                }
            }

            // Add Spatie Media Library columns if not exist
            if (!Schema::hasColumn('media', 'model_type')) {
                $table->string('model_type')->nullable();
                $table->unsignedBigInteger('model_id')->nullable();
                $table->index(['model_type', 'model_id']);
            }

            if (!Schema::hasColumn('media', 'uuid')) {
                $table->uuid('uuid')->nullable()->unique();
            }

            if (!Schema::hasColumn('media', 'collection_name')) {
                $table->string('collection_name')->default('default');
            }

            if (!Schema::hasColumn('media', 'name')) {
                $table->string('name')->nullable();
            }

            if (!Schema::hasColumn('media', 'file_name')) {
                $table->string('file_name')->nullable();
            }

            if (!Schema::hasColumn('media', 'mime_type')) {
                $table->string('mime_type')->nullable();
            }

            if (!Schema::hasColumn('media', 'disk')) {
                $table->string('disk')->default('public');
            }

            if (!Schema::hasColumn('media', 'conversions_disk')) {
                $table->string('conversions_disk')->nullable();
            }

            if (!Schema::hasColumn('media', 'size')) {
                $table->unsignedBigInteger('size')->default(0);
            }

            if (!Schema::hasColumn('media', 'manipulations')) {
                $table->json('manipulations')->nullable();
            }

            if (!Schema::hasColumn('media', 'custom_properties')) {
                $table->json('custom_properties')->nullable();
            }

            if (!Schema::hasColumn('media', 'generated_conversions')) {
                $table->json('generated_conversions')->nullable();
            }

            if (!Schema::hasColumn('media', 'responsive_images')) {
                $table->json('responsive_images')->nullable();
            }

            if (!Schema::hasColumn('media', 'order_column')) {
                $table->unsignedInteger('order_column')->nullable()->index();
            }
        });
    }

    public function down(): void
    {
        // Optional: Logic to revert changes
    }
};
