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
        Schema::create('teams', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->boolean('status')->nullable()->default(1);
            $table->string('slug', 512);
			$table->string('tname', 256)->nullable();
			$table->text('tcolor', 256)->nullable();
			$table->string('description', 256)->nullable();
			$table->string('coach_name', 256)->nullable();
			$table->string('team_captain', 256)->nullable();
			$table->string('venue',256)->nullable();
			$table->string('poster',256)->nullable();
			$table->string('thumbnail',256)->nullable();
			$table->string('start_time',256)->nullable();
			$table->boolean('end_time')->nullable()->default(0);
			$table->string('meta_title', 256)->nullable();
			$table->string('meta_keywords', 512)->nullable();
			$table->text('meta_description', 65535)->nullable();
			$table->integer('category_id')->nullable();
			$table->integer('user_id')->nullable();
			$table->timestamps();
			$table->boolean('publish')->nullable()->default(0);
			$table->string('is_publishable', 512)->nullable();
            $table->string('excerpt', 512)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
