<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('ministry_meetings', function (Blueprint $table) {
            $table
                ->foreignId('friendly_meeting_id')
                ->nullable()
                ->constrained('friendly_meetings')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('ministry_meetings', function (Blueprint $table) {
            $table->dropForeign(['friendly_meeting_id']);
        });
    }
};
