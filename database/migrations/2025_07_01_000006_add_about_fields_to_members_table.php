<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // ✅ إضافة الحقل المفقود أولاً
            $table->string('native_language')->nullable();

            // ✅ الحقول الجديدة المرتبطة بالتعريف الشخصي
            $table->text('about_yourself')->nullable()->after('native_language');
            $table->text('partner_description')->nullable()->after('about_yourself');
        });
    }

    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'native_language',
                'about_yourself',
                'partner_description',
            ]);
        });
    }
};
