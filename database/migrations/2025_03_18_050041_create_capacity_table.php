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
        Schema::create('capacity', function (Blueprint $table) {
            $table->id();
            $table->date('date')->nullable();
            $table->string('agronomy_name')->nullable();
            $table->string('activity')->nullable();
            $table->string('audience')->nullable();
            $table->string('topic_name')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('mandal_taluk')->nullable();
            $table->string('location')->nullable();
            $table->integer('participant')->nullable();
            $table->text('remarks')->nullable();
            $table->string('upload_file')->nullable();
            $table->string('upload_photo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('capacity');
    }
};