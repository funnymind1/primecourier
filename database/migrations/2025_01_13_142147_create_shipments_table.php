<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * This method creates the 'shipments' table, which stores information 
     * about individual shipments, including tracking details, recipient 
     * information, shipment dates, and package specifications.
     */
    public function up(): void
    {
        Schema::create('shipments', function (Blueprint $table) {
            // Primary key
            $table->id();

            // Unique tracking identifier for the shipment
            $table->string('tracking_id')->unique();

            // Recipient details
            $table->string('recipient_name');
            $table->string('destination');

            // Shipment and delivery dates
            $table->date('shipment_date');
            $table->date('due_date');

            // Package specifications
            $table->float('package_weight');
            $table->string('reference_number');
            $table->integer('package_qty');

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * This method drops the 'shipments' table if it exists, effectively 
     * rolling back the migration.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
