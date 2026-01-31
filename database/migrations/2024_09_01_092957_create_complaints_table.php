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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('complaint_type'); // نوع الشكوى
            $table->unsignedBigInteger('branch_id'); // ربط بالفرع من جدول الفروع
            $table->string('name'); // اسم العميل
            $table->string('phone_number'); // رقم الجوال
            $table->string('email')->nullable(); // البريد الإلكتروني (يمكن أن يكون فارغًا)
            $table->string('invoice_number'); // رقم الفاتورة
            $table->text('image')->nullable(); // حقل لتخزين أكثر من صورة (تخزين JSON للمسارات)
            $table->text('message'); // رسالة الشكوى
            $table->timestamps(); // إضافة أعمدة created_at و updated_at

            // العلاقة بين جدول الشكاوي وجدول الفروع
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
