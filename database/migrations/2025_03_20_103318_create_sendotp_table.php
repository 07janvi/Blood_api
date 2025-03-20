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
        Schema::create('sendotp', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('person_name');
            $table->string('surname');
            $table->date('dob');
            $table->string('contactno');
            $table->string('otp');
            $table->string('state');
            $table->string('district');
            $table->text('address');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sendotp');
    }
};
