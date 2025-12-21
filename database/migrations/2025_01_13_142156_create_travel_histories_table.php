<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * This method defines the schema for the 'travel_histories' table, which 
     * tracks the travel history of shipments, including status updates, 
     * feedback, location, and timestamps.
     */
    public function up(): void
    {
        Schema::create('travel_histories', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Foreign key to the shipments table with cascade delete
            $table->foreignId('shipment_id')
                ->constrained()
                ->cascadeOnDelete();

            // Enum field for tracking the status of the shipment
            $table->enum('status', [
                'Picked up',
                'In Transit',
                'Delayed',
                'Delivered'
            ])->default('Picked up');

            // Feedback about the shipment's status or journey
            $table->string('feedback');

            // Location where the status update is reported
            $table->string('location');

            // Link to a map showing the shipment's location
            $table->string('map_link');

            // Timestamp for when the status update occurred
            $table->timestamp('timestamp');

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method drops the 'travel_histories' table if it exists, effectively 
     * rolling back the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_histories');
    }
};
