<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('date');
            $table->string('scene')->nullable();
            $table->string('microphones')->nullable();
            $table->string('voiceover_zoom')->nullable();
            $table->string('administrator')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
