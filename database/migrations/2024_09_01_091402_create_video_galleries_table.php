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
        Schema::create('video_galleries', function (Blueprint $table) {
            $table->id();
            $table->string('video_link')->nullable(); // حقل رابط الفيديو الجديد
            $table->unsignedBigInteger('package_id'); // حقل يربط الجدول بجدول الباقات
            $table->unsignedBigInteger('category_id'); // حقل يربط الجدول بجدول كاتيجوري الباقات
            $table->text('details')->nullable(); // حقل التفاصيل
            // العلاقة بين جدول معرض الصور وجدول الباقات
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');
            // العلاقة بين جدول معرض الصور وجدول كاتيجوري الباقات
            $table->foreign('category_id')->references('id')->on('package_categories')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_galleries');
    }
};
