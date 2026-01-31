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
        Schema::create('construction_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('name'); // اسم العميل
            $table->string('phone_number'); // رقم الجوال
            $table->string('email')->nullable(); // البريد الإلكتروني
            $table->string('city'); // المدينة
            $table->unsignedBigInteger('service_id'); // حقل يربط الخدمة بجدول خدمات المقاولات
            $table->decimal('approximate_area', 8, 2); // المساحة التقريبية
            $table->string('image')->nullable(); // صور الموقع، يخزن أكثر من صورة بصيغة JSON
            $table->string('commercial_registry_files')->nullable();
            $table->string('status')->default('pending'); // الحالة الافتراضية 'pending'
            $table->timestamps();
            // العلاقة بين جدول حجز المقاولات وجدول خدمات المقاولات
            $table->foreign('service_id')->references('id')->on('construction_services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_bookings');
    }
};
