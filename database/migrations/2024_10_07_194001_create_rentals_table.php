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
            $table->foreignId('publisher_id')->constrained('users'); 
            $table->string('rental_name');
            $table->enum('rental_category', ['Room', 'Apartment', 'House', 'Other']);
            $table->enum('pets', ['Yes', 'No']);
            $table->enum('parking', ['Yes', 'No']);
            $table->enum('smoking', ['Yes', 'No']);
            $table->enum('music', ['Yes', 'No']);
            $table->integer('no_of_shares');
            $table->decimal('each_person_price', 8, 2); 
            $table->text('address');
            $table->string('phone');
            $table->text('rental_property_pictures')->nullable(); 
            $table->integer('no_of_beds');
            $table->integer('washroom');
            $table->enum('wifi', ['Yes', 'No']);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes(); 
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
