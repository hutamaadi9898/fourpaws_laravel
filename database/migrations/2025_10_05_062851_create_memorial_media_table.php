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
        Schema::create('memorial_media', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memorial_page_id')->constrained()->onDelete('cascade');
            $table->string('media_type', 50); // 'image', 'video', 'audio'
            $table->string('file_path', 500);
            $table->string('original_filename');
            $table->string('mime_type', 100);
            $table->integer('file_size');
            $table->string('alt_text', 500)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['memorial_page_id', 'sort_order']);
            $table->index(['media_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memorial_media');
    }
};
