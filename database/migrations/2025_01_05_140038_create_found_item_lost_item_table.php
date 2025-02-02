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
        Schema::create('found_item_lost_item', function (Blueprint $table) {
            $table->unsignedBigInteger('lost_item_id');
            $table->unsignedBigInteger('found_item_id');
            $table->timestamps();

            // Composite primary key
            $table->primary(['lost_item_id', 'found_item_id']);

            // Foreign key constraints
            // $table->foreign('lost_item_id')->references('id')->on('lost_items')->onDelete('cascade');
            // $table->foreign('found_item_id')->references('id')->on('found_items')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('found_item_lost_item');
    }
};
