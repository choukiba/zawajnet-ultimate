<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // ✅ لا تضف native_language مرة أخرى إن كان موجودًا

            // أضف فقط الحقول الإضافية الجديدة المرتبطة بالفلاتر المتقدمة
            $table->string('education_level')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('smoking')->nullable();
            $table->string('prayer_commitment')->nullable();
            $table->string('hijab_commitment')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'education_level',
                'marital_status',
                'smoking',
                'prayer_commitment',
                'hijab_commitment',
            ]);
        });
    }
};
