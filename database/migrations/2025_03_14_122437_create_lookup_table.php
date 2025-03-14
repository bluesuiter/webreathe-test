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
        Schema::create('lookup', function (Blueprint $table) {
            $table->id();
            $table->string('key', 24);
            $table->string('value', 225);
            $table->json('desc')->nullable();
            $table->boolean('system_fl')->default(false);
            $table->boolean('active_fl')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lookup');
    }
};
