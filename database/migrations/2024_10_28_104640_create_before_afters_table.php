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
        Schema::create('before_afters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('details');
            $table->string('image_before');
            $table->string('image_after');
            $table->timestamps(); // لإضافة حقل timestamps إذا كنت ترغب في تتبع وقت الإنشاء والتحديث
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('before_afters');
    }
};
