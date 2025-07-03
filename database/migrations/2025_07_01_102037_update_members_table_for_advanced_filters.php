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
        Schema::table('members', function (Blueprint $table) {
            

            // الموقع الجغرافي
            $table->string('city')->nullable();

            // الأطفال
            $table->boolean('has_children')->default(false);
            $table->unsignedTinyInteger('children_count')->nullable();

            // المظهر الخارجي
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('skin_color')->nullable();
            $table->string('hair_color')->nullable();

            // الالتزام الديني
            $table->boolean('prays')->nullable();
            $table->boolean('religious')->nullable();
            $table->boolean('wears_hijab')->nullable();  // للنساء
            $table->boolean('has_beard')->nullable();    // للرجال
            $table->boolean('reads_quran')->nullable();

            // الدراسة والعمل
            $table->string('education_level')->nullable();
            $table->string('job_status')->nullable(); // يعمل / لا يعمل
            $table->integer('monthly_income')->nullable();

            // الاستعداد للانتقال
            $table->boolean('willing_to_relocate')->nullable();

            // اللغات
            $table->string('native_language')->nullable();
            $table->json('other_languages')->nullable();

            // التحقق بالصور
            $table->boolean('is_verified')->default(false);

            // الظهور في البحث
            $table->boolean('show_in_search')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('members', function (Blueprint $table) {
            $table->dropColumn([
                'marital_status', 'marriage_type', 'city', 'has_children', 'children_count',
                'height', 'weight', 'skin_color', 'hair_color',
                'prays', 'religious', 'wears_hijab', 'has_beard', 'reads_quran',
                'education_level', 'job_status', 'monthly_income',
                'willing_to_relocate', 'native_language', 'other_languages',
                'is_verified', 'show_in_search'
            ]);
        });
    }
};
