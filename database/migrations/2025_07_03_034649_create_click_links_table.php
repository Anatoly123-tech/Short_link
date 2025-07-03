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
        Schema::create('click_links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('link_id')->constrained('links')->onDelete('cascade');
            $table->string('ip');
            $table->timestamp('clicked');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('click_links');
    }
};
