<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->id(); // هذا هو المفتاح الذي تحتاجه المدن للربط
            $table->string('name_ar')->unique(); // الاسم العربي
            $table->string('name_en')->nullable(); // الاسم الإنجليزي
            $table->string('code')->nullable(); // رمز الدولة (اختياري)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
