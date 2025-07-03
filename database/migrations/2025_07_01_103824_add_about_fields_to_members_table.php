<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * تشغيل التعديلات على الجدول.
     */
    public function up(): void
    {
        Schema::table('members', function (Blueprint $table) {
            // حقل "عرف بنفسك"
            $table->text('about_yourself')->nullable()->after('native_language');

            // حقل "تكلم حول شريكك"
            $table->text('about_partner')->nullable()->after('about_yourself');
        });
    }

    /**
     * التراجع عن التعديلات.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn(['about_yourself', 'about_partner']);
        });
    }
};
