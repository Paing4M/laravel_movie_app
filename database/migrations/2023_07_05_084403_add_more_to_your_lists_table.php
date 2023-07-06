<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::table('your_lists', function (Blueprint $table) {
            $table->text('title');
            $table->text('poster');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::table('your_lists', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('poster');
        });
    }
};
