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
    Schema::create('orders', function (Blueprint $table) {
      $table->informetion_ordersid();
      $table->string('order_id');
      $table->unsignedBigInteger('user_id');
      $table->unsignedBigInteger('informetion_orders');
      $table->float('total_amount');
      $table->unsignedBigInteger('status')->default(1);
      $table->foreign('user_id')->references('id')->on('users');
      $table->foreign('status')->references('id')->on('status_orders');
      $table->foreign('informetion_orders')->references('id')->on('informetion_orders');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('orders');
  }
};