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
        Schema::create('announcements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('match_id');
            $table->foreign('match_id')->references('id')->on('create_matches')->onDelete('cascade');
            $table->unsignedBigInteger('winning_team_id');
            $table->foreign('winning_team_id')->references('id')->on('teams');
            $table->string('winnerTeam')->nullable();
            $table->string('looserTeam')->default('Team A vs Team B');
            $table->float('winner')->default(0);
            $table->float('looser')->default(0);
            $table->integer('status')->default(0); 

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('announcements');
    }
};
