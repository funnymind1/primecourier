<?php

namespace App\Livewire\Dash;

use Livewire\Component;
use App\Models\Shipment;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class CreateShipment extends Component
{
    #[Layout('layouts.dash')]
    #[Title('Create Shipment')]

    public $recipient_name;
    public $destination;
    public $shipment_date;
    public $due_date;
    public $package_weight;
    public $package_qty;

    // Method to generate tracking ID in the format AAVX-8717-1540-7146
    private function generateTrackingId()
    {
        // Generates 4 random uppercase letters (no numbers)
        $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4));

        // Generates 3 random numbers between 1000 and 9999 for the numeric sections
        $numbers1 = mt_rand(1000, 9999);
        $numbers2 = mt_rand(1000, 9999);
        $numbers3 = mt_rand(1000, 9999);

        // Returns the generated tracking ID in the correct format using interpolation
        return "{$letters}-{$numbers1}-{$numbers2}-{$numbers3}";
    }

    // Method to generate reference number in the format REF-38598292
    private function generateReferenceNumber()
    {
        // Generates a random 8-digit number
        return 'REF-' . rand(10000000, 99999999);
    }

    // Method to save shipment data
    public function createShipment()
    {
        Shipment::create([
            'tracking_id' => $this->generateTrackingId(),
            'recipient_name' => $this->recipient_name,
            'destination' => $this->destination,
            'shipment_date' => Carbon::parse($this->shipment_date)->format('Y-m-d H:i:s'),
            'due_date' => Carbon::parse($this->due_date)->format('Y-m-d H:i:s'),
            'package_weight' => $this->package_weight,
            'reference_number' => $this->generateReferenceNumber(),
            'package_qty' => $this->package_qty,
        ]);

        session()->flash('message', 'Shipment created successfully!');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.dash.create-shipment');
    }
}
