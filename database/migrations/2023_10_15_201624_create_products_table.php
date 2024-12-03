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

    Schema::create('typegames', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('namear');
      $table->timestamps();
    });

    Schema::create('filter', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('namear');
      $table->string('data_filter');
      $table->string('data_filter_ar');
      $table->timestamps();
    });
    Schema::create('products', function (Blueprint $table) {
      $table->id();
      $table->string('name');
      $table->string('namear');
      $table->string('description');
      $table->string('descriptionar');
      $table->float('price');
      $table->float('discount');
      $table->float('price_after_discount');
      $table->string('image');
      $table->unsignedBigInteger('type');
      $table->unsignedBigInteger('filter')->nullable();
      $table->unsignedBigInteger('quantity');
      $table->foreign('type')->references('id')->on('typegames');
      $table->foreign('filter')->references('id')->on('filter');
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
