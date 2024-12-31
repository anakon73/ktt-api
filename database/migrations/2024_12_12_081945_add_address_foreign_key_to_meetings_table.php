<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::select("SELECT column_name FROM information_schema.columns WHERE table_name='meetings' AND column_name='address_id'")) {
            Schema::table('meetings', function (Blueprint $table) {
                $table->dropForeign(['address_id']);
                $table->dropColumn('address_id');
            });
        }

        if (!Schema::hasTable('addresses')) {
            throw new \RuntimeException('Table addresses does not exist');
        }

        Schema::table('meetings', function (Blueprint $table) {
            $table->foreignId('address_id')
                ->nullable()
                ->constrained('addresses')
                ->onDelete('set null');
        });
    }

    public function down(): void
    {
        if (DB::select("SELECT column_name FROM information_schema.columns WHERE table_name='meetings' AND column_name='address_id'")) {
            Schema::table('meetings', function (Blueprint $table) {
                $table->dropForeign(['address_id']);
                $table->dropColumn('address_id');
            });
        }
    }
};
