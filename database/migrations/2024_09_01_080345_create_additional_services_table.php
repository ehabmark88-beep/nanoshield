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
        Schema::create('additional_services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // حقل الاسم
            $table->decimal('price', 8, 2); // حقل السعر مع تحديد دقة العدد
            $table->text('details')->nullable()->default('0'); // حقل التفاصيل
            $table->integer('duration'); // حقل الوقت (المدة الزمنية)
            $table->string('image')->nullable(); // حقل الصورة ويمكن أن يكون null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('additional_services');
    }
};
