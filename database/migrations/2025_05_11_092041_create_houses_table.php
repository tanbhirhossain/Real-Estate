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
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('realtor_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('short_desc');
            $table->longText('descriptions');
            $table->decimal('price', 10, 2);
            $table->string('city');
            $table->text('address')->nullable();
            $table->integer('bedroom')->nullable()->default(0);
            $table->integer('bathroom')->nullable()->default(0);
            
            $table->integer('size')->nullable();
            $table->unsignedBigInteger('created_by');

            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('realtor_id')->references('id')->on('realtors')->cascadeOnDelete();
            $table->foreign('category_id')->references('id')->on('categories');

   
            //House gallery image will implement with media library package
            $table->timestamps();

            $table->index('created_by');
            $table->index('realtor_id');
            $table->index('category_id');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
