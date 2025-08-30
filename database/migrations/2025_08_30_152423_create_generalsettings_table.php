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
        Schema::create('generalsettings', function (Blueprint $table) {
            $table->id();
            $table->string('header_title')->nullable();
            $table->string('header_logo')->nullable();
            $table->string('featured_category_title')->nullable();
            $table->string('popular_product_title')->nullable();
            $table->string('daily_best_sells_title')->nullable();
            $table->string('footer_category_title')->nullable();
            $table->string('footer_payment_title')->nullable();
            $table->string('download_title')->nullable();
            $table->string('copyright')->nullable();
            $table->string('follow_us_title')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generalsettings');
    }
};
