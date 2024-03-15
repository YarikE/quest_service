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
        Schema::create('quest', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('coast');
            $table->integer('tasks_amount');
            $table->integer('accessible_quest_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quest');
    }
};
