<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ministry_meetings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('date');
            $table->string('leader')->nullable();
            $table->string('address')->nullable();
            $table->string('address_url')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ministry_meetings');
    }
};
