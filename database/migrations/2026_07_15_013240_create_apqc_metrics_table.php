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
        Schema::create('apqc_metrics', function (Blueprint $table) {
            $table->id();
            
            $table->foreignId('apqc_process_id')->constrained('apqc_processes')->onDelete('cascade');
            
            $table->string('metric_id')->nullable();       
            $table->string('metric_category')->nullable(); 
            $table->text('metric_name');                   
            $table->text('formula')->nullable();           
            $table->string('units')->nullable();           
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apqc_metrics');
    }
};
