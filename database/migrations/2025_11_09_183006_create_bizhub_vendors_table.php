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
        Schema::create('bizhub_vendors', function (Blueprint $table) {
            $table->bigIncrements('vendorID');
            $table->string('name', 255);
            $table->string('phone_number', 20);
            $table->text('service');
            $table->string('image_path', 255);
            $table->enum('status', ['Pending', 'Approved'])->default('Pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bizhub_vendors');
    }
};