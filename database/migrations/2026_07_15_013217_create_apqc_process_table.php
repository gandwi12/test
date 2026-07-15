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
        Schema::create('apqc_processes', function (Blueprint $table) {
            $table->id();
            $table->integer('pcf_id')->unique();
            $table->string('hierarchy_id');
            $table->string('name');
            $table->boolean('has_metric')->default(false);
            $table->text('element_description')->nullable();
            
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('level')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('apqc_processes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apqc_process');
    }
};
