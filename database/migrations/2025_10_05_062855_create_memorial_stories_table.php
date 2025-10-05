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
        Schema::create('memorial_stories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memorial_page_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('content');
            $table->string('author_name')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();

            $table->index(['memorial_page_id', 'sort_order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memorial_stories');
    }
};
