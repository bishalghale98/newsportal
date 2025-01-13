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
        // Check if the 'views' column already exists before adding it
        if (!Schema::hasColumn('posts', 'views')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->unsignedBigInteger('views')->default(0); // Add the 'views' column
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Check if the 'views' column exists before attempting to drop it
        if (Schema::hasColumn('posts', 'views')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropColumn('views'); // Remove the 'views' column
            });
        }
    }
};
