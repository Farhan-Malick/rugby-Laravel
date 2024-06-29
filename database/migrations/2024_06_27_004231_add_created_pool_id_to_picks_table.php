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
            $table->string('created_pool_id')->nullable()->after('rnd'); // Adjust the data type as per your requirement
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
