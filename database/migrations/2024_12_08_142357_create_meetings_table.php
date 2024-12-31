<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::disableForeignKeyConstraints();

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
                ->nullable()
                ->constrained('meeting_statuses')
                ->onDelete('set null');
        });

        Schema::enableForeignKeyConstraints();
    }

    public function down(): void
    {
        Schema::table('meetings', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
        });

        Schema::dropIfExists('meetings');
    }
};
