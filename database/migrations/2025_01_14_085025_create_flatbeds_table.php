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
        Schema::create('flatbeds', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // حقل الاسم
            $table->string('name_ar'); // حقل الاسم
            $table->decimal('price'); // حقل السعر مع دقة

            $table->unsignedBigInteger('flatbed_type_id'); // العمود الجديد للارتباط
            $table->foreign('flatbed_type_id')->references('id')->on('flatbed_types')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('flatbeds');
    }
};
