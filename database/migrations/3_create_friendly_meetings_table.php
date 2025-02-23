<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('friendly_meetings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->timestamp('date');
            $table->string('description');
            $table->string('inviting');
            $table->string('address');
            $table->string('address_url');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('friendly_meetings');
    }
};
