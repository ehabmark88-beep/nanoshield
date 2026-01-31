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
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name'); // اسم الفرع
            $table->string('branch_address'); // عنوان الفرع
            $table->string('branch_link', 512)->change(); // تغيير حجم العمود إلى 512
            $table->text('branch_details')->nullable();; // تفاصيل الفرع
            $table->foreignId('governorate_id') // ربط المحافظة كمفتاح أجنبي
                ->constrained('governorates')
                ->onDelete('cascade');
            $table->string('contact_us')->nullable(); // لينك الفرع، يمكن أن يكون null
            $table->string('image')->nullable(); // صورة مرفقة، يمكن أن تكون null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches');
    }
};
