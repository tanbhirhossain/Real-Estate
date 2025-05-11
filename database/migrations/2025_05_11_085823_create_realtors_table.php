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
        Schema::create('realtors', function (Blueprint $table) {
            $table->id();
            $table->string('name', 70);
            $table->string('phone', 15);
            $table->string('email');
            $table->text('address')->nullable();
            //Image will need to integrate with Laravel media Library (Spatie)
            $table->unsignedBigInteger('created_by')->nullable();

            $table->foreign('created_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realtors');
    }
};
