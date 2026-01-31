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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // عنوان المقال
            $table->string('title_ar'); // عنوان المقال
            $table->string('details'); // عنوان المقال
            $table->string('details_ar'); // عنوان المقال
            $table->string('more_details')->nullable(); // عنوان المقال
            $table->string('more_details_ar')->nullable()->nullable(); // عنوان المقال
            $table->string('image'); // الصورة الرئيسية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
