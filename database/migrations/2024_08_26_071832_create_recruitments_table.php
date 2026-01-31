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
        Schema::create('recruitments', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->date('date_of_birth');
            $table->string('phone', 15);  // تحديد الطول (يمكنك تعديل الطول حسب الحاجة)
            $table->string('email', 150)->nullable();
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('job_position', 100);
            $table->string('city', 100);
            $table->text('training_courses')->nullable();
            $table->string('cv');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recruitments');
    }
};
