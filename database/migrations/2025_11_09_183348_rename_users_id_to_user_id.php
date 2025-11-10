<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Check if users table has 'id' column (default Laravel) or 'userID'
        if (Schema::hasColumn('users', 'id') && !Schema::hasColumn('users', 'userID')) {
            // Drop foreign key in sessions table if it exists
            Schema::table('sessions', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
            
            // Rename id to userID
            DB::statement('ALTER TABLE `users` CHANGE `id` `userID` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
            
            // Recreate foreign key in sessions table
            Schema::table('sessions', function (Blueprint $table) {
                $table->foreign('user_id')->references('userID')->on('users')->onDelete('cascade');
            });
        }
        
        // Add role column if it doesn't exist
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->enum('role', ['Admin', 'Editor'])->default('Editor')->after('password');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Remove role column
        if (Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('role');
            });
        }
        
        // Rename userID back to id
        if (Schema::hasColumn('users', 'userID') && !Schema::hasColumn('users', 'id')) {
            // Drop foreign key in sessions table
            Schema::table('sessions', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
            });
            
            // Rename userID back to id
            DB::statement('ALTER TABLE `users` CHANGE `userID` `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT');
            
            // Recreate foreign key in sessions table
            Schema::table('sessions', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            });
        }
    }
};
