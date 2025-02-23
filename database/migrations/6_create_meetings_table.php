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

            $foreignKeys = [
                'status_id' => 'meeting_statuses',
                'service_id' => 'services',
                'address_id' => 'addresses',
                'ministry_meeting_id' => 'ministry_meetings',
            ];

            foreach ($foreignKeys as $column => $referenceTable) {
                $table->foreignId($column)
                    ->nullable()
                    ->constrained($referenceTable)
                    ->onDelete('set null');
            }
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
