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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('description');
            $table->string('police_report_number');
            $table->string('address');
            $table->enum('status', [
                'diagnosing', 
                'getting_part', 
                'purchased_part', 
                'fixing', 
                'fixed'
            ]);

            $table->string('car_plate_number');

            $table->foreignId('workshop_id')                
                ->constrained('workshops')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->string('diagnosis')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incidents');
    }
};
