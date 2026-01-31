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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // حقل الاسم
            $table->decimal('price'); // حقل السعر مع دقة
            $table->decimal('discounted_price')->nullable()->default('0'); // السعر قبل الخصم (يمكن أن يكون null)
            $table->integer('hours'); // عدد الساعات
            $table->string('feature_1')->nullable(); // خاصية 1
            $table->string('feature_2')->nullable(); // خاصية 2
            $table->string('feature_3')->nullable(); // خاصية 3
            $table->string('feature_4')->nullable(); // خاصية 4
            $table->string('feature_5')->nullable(); // خاصية 5
            $table->string('feature_6')->nullable(); // خاصية 6
            $table->string('feature_7')->nullable(); // خاصية 7
            $table->string('feature_8')->nullable(); // خاصية 8
            $table->string('feature_9')->nullable(); // خاصية 9
            $table->unsignedBigInteger('category_id'); // حقل الكاتيجوري (علاقته بجداول أخرى)
            $table->unsignedBigInteger('car_id'); // حقل الكاتيجوري (علاقته بجداول أخرى)

            // العلاقات
            $table->foreign('category_id')->references('id')->on('package_categories')->onDelete('cascade');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
