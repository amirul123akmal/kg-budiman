<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bizhub_vendors', function (Blueprint $table) {
            $table->string('location')->after('service');
            $table->string('operation_time')->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
    }
};
