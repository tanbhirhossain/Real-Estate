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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('house_id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_email');

            $table->date('check_in');
            $table->date('check_out');
            $table->integer('no_nights');
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('total_cost', 10,2);
            $table->longText('note')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'cancelled']);
            $table->unsignedBigInteger('cancelled_by')->nullable();
            $table->longText('remarks')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->comment('IF NULL Then its from Website IF NOT NULL then it will count as in house booking'); 

            $table->foreign('house_id')->references('id')->on('houses');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('cancelled_by')->references('id')->on('users')->onDelete('set null');

            $table->timestamps();
        });

        Schema::create('booking_confirm', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('booking_id');
            $table->unsignedBigInteger('confirmed_by');
            $table->longText('remarks')->nullable();

            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade');
            $table->foreign('confirmed_by')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_confirm'); // Drop child table first due to foreign keys
        Schema::dropIfExists('bookings');
    }
};
