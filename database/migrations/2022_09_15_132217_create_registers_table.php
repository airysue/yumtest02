<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   * @return void
   */
  public function up()
  {
    Schema::create('registers', function (Blueprint $table) {
      $table->id();

      $table->string('name', 50);
      $table->string('email', 50);
      $table->string('tel', 20);
      $table->enum('sex', ['male', 'female'])->nullable(); //列舉類型
      $table->text('aboutme')->nullable();
      $table->string('landmark', 20)->nullable();
      $table->json('dislikefood')->nullable();

      $table->timestamps();
    });
  }
  /**
   * Reverse the migrations.
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('registers');
  }
};