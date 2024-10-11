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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->string('rental_name');
            $table->enum('rental_category', ['House', 'FarmHouse', 'Apartment', 'Villa']);
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->decimal('each_person_price', 10, 2);
            $table->string('address');
            $table->string('phone');
            $table->text('description')->nullable();
            
            // New fields
            $table->decimal('size_in_sqm', 10, 2); // Size in square meters
            $table->integer('max_people');
            $table->integer('common_rooms')->default(0); // Default 0
            $table->integer('bedrooms')->default(1); // Default 1
            $table->integer('bathrooms')->default(1); // Default 1
            $table->enum('exterior', ['Yes', 'No']);
            
            // Equipment (boolean fields)
            $table->boolean('baby_bed')->default(false);
            $table->boolean('double_bed')->default(false);
            $table->boolean('sofa_bed')->default(false);
            $table->boolean('duvets')->default(false);
            $table->boolean('pillows')->default(false);
            $table->boolean('sheets')->default(false);
            $table->boolean('pillow_protectors')->default(false);
            $table->boolean('shower')->default(false);
            $table->boolean('bath_towels')->default(false);
            $table->boolean('washing_machine')->default(false);
            $table->boolean('microwave')->default(false);
            $table->boolean('hotplates')->default(false);
            $table->boolean('fridge')->default(false);
            $table->boolean('freezer')->default(false);
            $table->boolean('coffee_maker')->default(false);
            $table->boolean('tea_towels')->default(false);
            $table->boolean('table')->default(false);
            $table->boolean('chairs')->default(false);
            $table->boolean('baby_high_chair')->default(false);
            $table->boolean('coffee_table')->default(false);
            $table->boolean('television')->default(false);
            $table->boolean('fan')->default(false);
            $table->boolean('smoke_detector')->default(false);
            
            // File upload field for images
            $table->string('rental_property_pictures')->nullable(); 

            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
