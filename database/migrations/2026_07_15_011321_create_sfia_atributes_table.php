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
        Schema::create('sfia_atributes', function (Blueprint $table) {
            $table->id();
            $table->string('Level_1')->nullable();
            $table->string('Level_2')->nullable();
            $table->string('Level_3')->nullable();
            $table->string('Level_4')->nullable();
            $table->string('Level_5')->nullable();
            $table->string('Level_6')->nullable();
            $table->string('Level_7')->nullable();
            $table->string('Code')->unique();
            $table->string('URL');
            $table->string('Atribute_name');
            $table->string('Type');
            $table->text('Overall_Description');
            $table->text('Guidance_Notes');
            $table->string('Level_1_description')->nullable();
            $table->string('Level_2_description')->nullable();
            $table->string('Level_3_description')->nullable();
            $table->string('Level_4_description')->nullable();
            $table->string('Level_5_description')->nullable();
            $table->string('Level_6_description')->nullable();
            $table->string('Level_7_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sfia_atributes');
    }
};
