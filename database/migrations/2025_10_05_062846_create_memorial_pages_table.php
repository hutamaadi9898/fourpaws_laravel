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
        Schema::create('memorial_pages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('pet_name');
            $table->string('pet_type', 100);
            $table->string('breed')->nullable();
            $table->date('birth_date')->nullable();
            $table->date('death_date')->nullable();
            $table->string('slug')->unique();
            $table->foreignId('template_id')->constrained('memorial_templates');
            $table->jsonb('custom_settings')->default('{}');
            $table->text('description')->nullable();
            $table->boolean('is_published')->default(false);
            $table->integer('view_count')->default(0);
            $table->timestamps();

            $table->index(['user_id', 'is_published']);
            $table->index(['is_published', 'created_at']);
            $table->index(['slug']);
            $table->index(['pet_type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memorial_pages');
    }
};
