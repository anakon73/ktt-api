<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('leading');
            $table->string('speaker')->nullable();
            $table->string('speech_title')->nullable();
            $table->string('lead_wt')->nullable();
            $table->string('reader')->nullable();
            $table->string('closing_prayer')->nullable();
            // $table->integer('mm_id');
            $table->string('special_program')->nullable();
            $table->string('place_address')->nullable();
            $table->string('place_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
