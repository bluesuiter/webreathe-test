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
        Schema::create('notification', function (Blueprint $table) {
            $table->id();
            $table->string('description', 225);
            $table->integer('user_id')->nullable();
            $table->boolean('global_fl')->default(false);
            $table->timestamps();
        });

        Schema::create('notification_status', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('notification_id');
            $table->integer('user_id')->nullable();
            $table->boolean('read_fl')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notification');
    }
};
