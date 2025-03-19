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
        Schema::create('agronomy', function (Blueprint $table) {
            $table->id();
            $table->string('farmer_name')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('mandal_taluk')->nullable();
            $table->string('village')->nullable();
            $table->string('crop')->nullable();
            $table->float('area')->nullable();
            $table->string('mis_type')->nullable();
            $table->string('crop_spacing')->nullable();
            $table->date('installation_date')->nullable();
            $table->date('planting_date')->nullable();
            $table->date('harvesting_date')->nullable();
            $table->float('drip_current_area')->nullable();
            $table->float('drip_par')->nullable();
            $table->float('expenditure_current_area')->nullable();
            $table->float('expenditure_par')->nullable();
            $table->float('income_current_area')->nullable();
            $table->float('income_par')->nullable();
            $table->float('profit_current_area')->nullable();
            $table->float('profit_par')->nullable();
            $table->float('yield_current_area')->nullable();
            $table->float('yield_par')->nullable();
            $table->float('e_current_area')->nullable();
            $table->float('e_par')->nullable();
            $table->float('i_current_area')->nullable();
            $table->float('i_par')->nullable();
            $table->float('net_current_area')->nullable();
            $table->float('net_par')->nullable();
            $table->float('income_drip_current_area')->nullable();
            $table->float('income_drip_par')->nullable();
            $table->text('farmer_feedback');
            $table->json('crop_farmer_photos')->nullable();
            $table->text('success_story')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agronomy');
    }
};
