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
        if (!Schema::hasTable('competitions')) {
            Schema::create('competitions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->integer('year');
                $table->string('theme');
                $table->integer('p_correct');
                $table->integer('p_incorrect');
                $table->integer('p_empty');

                $table->unique(["name", "year"]);
            });
        }
        if (!Schema::hasTable('rounds')) {
            Schema::create('rounds', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->date('date')->nullable();
                $table->unsignedInteger('competition_id');

                $table->foreign('competition_id')->references('id')->on('competitions')->cascadeOnDelete();

            });
        }
        if (!Schema::hasTable('competitors')) {
            Schema::create('competitors', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->date('birth');
                $table->string('address');
            });
        }
        if (!Schema::hasTable('part_of')) {
            Schema::create('part_of', function (Blueprint $table) {
                $table->unsignedInteger('round_id');
                $table->unsignedInteger('competitor_id');

                $table->foreign('round_id')->references('id')->on('rounds')->cascadeOnDelete();
                $table->foreign('competitor_id')->references('id')->on('competitors')->cascadeOnDelete();
            });
        }
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->string('email');
                $table->string('password');
                $table->string('phone_number')->nullable();
                $table->string('address')->nullable();
                $table->boolean('is_admin')->default(false);

                $table->primary('email');
            });
        }

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('part_of');
        Schema::dropIfExists('rounds');
        Schema::dropIfExists('competitions');
        Schema::dropIfExists('competitors');
        Schema::dropIfExists('users');
    }
};
