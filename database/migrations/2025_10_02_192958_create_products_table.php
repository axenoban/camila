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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('category');
            $table->string('fabric_type');
            $table->string('collection')->nullable();
            $table->text('description');
            $table->string('composition')->nullable();
            $table->string('width')->nullable();
            $table->string('weight')->nullable();
            $table->decimal('price_per_meter', 8, 2)->nullable();
            $table->integer('lead_time_days')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
