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
        Schema::table('found_items', function (Blueprint $table) {
            $table->text("question_1");
            $table->text("answer_1");
            $table->text("question_2");
            $table->text("answer_2");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('found_items', function (Blueprint $table) {
            $table->dropColumn("question_1");
            $table->dropColumn("answer_1");
            $table->dropColumn("question_2");
            $table->dropColumn("answer_2");
        });
    }
};
