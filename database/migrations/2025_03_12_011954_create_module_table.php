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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sr_no', 225)->unique('mod_sr_no');
            $table->integer('mtbf')->comment('mean time between failures')->default(0);
            $table->integer('min_operating_temp')->comment('minimum operating temprature');
            $table->unsignedInteger('max_operating_temp')->comment('maximum operating temprature');
            $table->boolean('installed_fl')->comment('is module installed')->default(false);
            $table->boolean('active_fl')->comment('is module active')->default(true);
            $table->datetime('created_at')->useCurrent();
            $table->bigInteger('created_by');
            $table->datetime('updated_at')->nullable(true);
            $table->bigInteger('updated_by')->nullable(true);
        });

        Schema::create('module_activities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->foreign('module_id')->references('id')->on('modules');
            $table->string('description', 225);
            $table->integer('temprature')->default(0)->comment('temprature of module');
            $table->boolean('up_fl')->default(true)->comment('is module up');
            $table->datetime('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
        Schema::dropIfExists('module_activities');
    }
};
