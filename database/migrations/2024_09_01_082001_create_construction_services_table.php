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
        Schema::create('construction_services', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // حقل الاسم
            $table->text('details')->nullable(); // حقل التفاصيل
            $table->string('image')->nullable(); // حقل الصورة ويمكن أن يكون null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('construction_services');
    }
};
