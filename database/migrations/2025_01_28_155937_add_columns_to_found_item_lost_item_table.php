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
        Schema::table('found_item_lost_item', function (Blueprint $table) {
            $table->text('answer_1');
            $table->text('answer_2');
            $table->string('claimed_user_name');
            $table->text('lost_item_name');
            $table->text('found_item_name');
     
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('found_item_lost_item', function (Blueprint $table) {
            $table->dropColumn('answer_1');
            $table->dropColumn('answer_2');
            $table->dropColumn('claimed_user_name');
            $table->dropColumn('lost_item_name');
            $table->dropColumn('found_item_name');
        });
    }
};
