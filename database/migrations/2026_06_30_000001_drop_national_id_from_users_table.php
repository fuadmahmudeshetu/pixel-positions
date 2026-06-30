<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'national_id')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->dropUnique(['national_id']);
        });

        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('national_id');
        });
    }

    public function down(): void
    {
        if (Schema::hasColumn('users', 'national_id')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('national_id')->nullable()->unique()->after('phone_number');
        });
    }
};