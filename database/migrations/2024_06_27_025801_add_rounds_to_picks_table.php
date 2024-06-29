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
        Schema::table('picks', function (Blueprint $table) {
            $table->integer('round4')->nullable()->after('round3');
            $table->integer('round5')->nullable()->after('round4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('picks', function (Blueprint $table) {
            //
        });
    }
};
