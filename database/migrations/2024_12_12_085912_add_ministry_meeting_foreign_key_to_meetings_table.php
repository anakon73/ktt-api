<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table
                ->foreignId('ministry_meeting_id')
                ->nullable()
                ->constrained('ministry_meetings')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->dropForeign(['ministry_meeting_id']);
        });
    }
};
