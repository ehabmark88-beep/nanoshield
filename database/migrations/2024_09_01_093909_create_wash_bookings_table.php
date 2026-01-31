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
        Schema::create('wash_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('phone_number');
            $table->string('email');
            $table->json('packages'); // إذا كنت تخزن البيانات في JSON
            $table->json('additional_services'); // إذا كنت تخزن البيانات في JSON
            $table->foreignId('branch_id')->constrained()->onDelete('cascade');
            $table->date('date');
            $table->time('time');
            $table->integer('duration'); // إذا كنت تخزن المدة بالثواني أو بالدقائق
            $table->foreignId('coupon_id')->nullable()->constrained()->onDelete('set null');
            $table->decimal('total_price', 10, 2);
            $table->string('payment_method');
            $table->foreignId('flatbed_service_id')->constrained()->onDelete('cascade')->default('0');
            $table->string('status')->default('pending');
            $table->timestamps(); // سيضيف `created_at` و `updated_at` مرة واحدة
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wash_bookings');
    }
};
