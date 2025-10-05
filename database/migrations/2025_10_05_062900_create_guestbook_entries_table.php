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
        Schema::create('guestbook_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('memorial_page_id')->constrained()->onDelete('cascade');
            $table->string('visitor_name');
            $table->string('visitor_email')->nullable();
            $table->text('message');
            $table->boolean('is_approved')->default(true);
            $table->timestamps();

            $table->index(['memorial_page_id', 'is_approved', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guestbook_entries');
    }
};
