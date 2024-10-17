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
        Schema::create('kanban_material_fas', function (Blueprint $table) {
            $table->id();
            $table->string('lokasi', 10);
            $table->string('month');
            $table->integer('part_number');
            $table->integer('part_address');
            $table->integer('issue');
            $table->integer('wip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kanban_material_fas');
    }
};
