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
        Schema::create('item_change_logs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('item_id');
            $table->integer('quantity');
            $table->string('user_identifing_info_1');
            $table->string('user_identifing_info_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_change_logs');
    }
};
