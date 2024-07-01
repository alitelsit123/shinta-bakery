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
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('address');
            $table->time('open_time');
            $table->time('close_time');
            $table->string('address_pin')->nullable();
            $table->text('image')->nullable();
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
          $table->unsignedBigInteger('outlet_id')->nullable();
        });
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn(['address_latlng']);
          $table->string('address_pin')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
      Schema::dropIfExists('outlets');
      Schema::table('products', function (Blueprint $table) {
        $table->dropColumn(['outlet_id']);
      });
      Schema::table('users', function (Blueprint $table) {
        $table->string('address_latlng')->nullable();
        $table->dropColumn(['address_pin']);
      });
    }
};
