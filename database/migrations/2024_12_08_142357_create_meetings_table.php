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
            $table->timestamp('date');
            $table->string('leading');
            $table->string('speaker')->nullable();
            $table->string('speech_title')->nullable();
            $table->string('lead_wt')->nullable();
            $table->string('reader')->nullable();
            $table->string('closing_prayer')->nullable();
            $table->string('special_program')->nullable();
            $table
                ->foreignId('status_id')
                ->constrained('meeting_statuses')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meetings');
        Schema::dropIfExists('meeting_statuses');
    }
};
