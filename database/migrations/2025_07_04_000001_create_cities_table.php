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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('country_id');  // مفتاح أجنبي إلى جدول countries
            $table->string('name_en');  // اسم المدينة بالإنجليزية
            $table->string('name_ar');  // اسم المدينة بالعربية
            $table->timestamps();

            // الربط بين المدن والدول
            $table->foreign('country_id')
                  ->references('id')->on('countries')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
