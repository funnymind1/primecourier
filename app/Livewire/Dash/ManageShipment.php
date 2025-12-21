<?php

namespace App\Livewire\Dash;

use App\Models\Shipment;
use App\Models\TravelHistory;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ManageShipment extends Component
{
    #[Layout('layouts.dash')]
    #[Title('Manage Shipment')]

    // Public properties for shipment details
    public $shipment_information;
    public $recipient_name;
    public $destination;
    public $shipment_date;
    public $due_date;
    public $package_weight;
    public $package_qty;

    // Public properties for new travel history form
    public $travel_history_status;
    public $travel_history_feedback;
    public $travel_history_location;
    public $travel_history_map_link;
    public $travel_history_timestamp;

    // Mount the component
    public function mount()
    {
        // Retrieve tracking ID from the query string
        $tracking_id = request()->query('tracking_id');

        // Attempt to retrieve shipment data
        if (!$tracking_id || !$this->loadShipment($tracking_id)) {
            // Flash a message and redirect
            session()->flash('message', $tracking_id ? 'The shipment associated with the provided Tracking ID was not found. Please verify the ID and try again.' : 'Please provide a valid Tracking ID to view the shipment details.');

            // Redirect to the dashboard
            return redirect()->route('dashboard');
        }

        // Fill the shipment details
        $this->fillShipmentDetails();
    }

    // Load the shipment data
    private function loadShipment($tracking_id)
    {
        // Load the shipment data
        $this->shipment_information = Shipment::where('tracking_id', $tracking_id)->first();

        // Return true if the shipment data is found
        return $this->shipment_information;
    }

    // Fill the shipment details
    private function fillShipmentDetails()
    {
        // Fill the shipment details
        $this->recipient_name = $this->shipment_information->recipient_name;
        $this->destination = $this->shipment_information->destination;
        $this->shipment_date = Carbon::parse($this->shipment_information->shipment_date)->format('Y-m-d H:i:s');
        $this->due_date = Carbon::parse($this->shipment_information->due_date)->format('Y-m-d H:i:s');
        $this->package_weight = $this->shipment_information->package_weight;
        $this->package_qty = $this->shipment_information->package_qty;
    }

    // Modify the shipment
    public function modifyShipment()
    {
        // Attempt to modify the shipment
        if ($this->shipment_information) {

            // Update the shipment details
            $this->shipment_information->update([
                'recipient_name' => $this->recipient_name,
                'destination' => $this->destination,
                'shipment_date' => $this->shipment_date,
                'due_date' => $this->due_date,
                'package_weight' => $this->package_weight,
                'package_qty' => $this->package_qty,
            ]);

            // Flash a message and redirect
            session()->flash('message', 'Shipment details have been successfully updated.');
            return;
        }

        // Flash a message
        session()->flash('message', 'Shipment information is not available.');
    }


    // Method to delete travel history
    public function deleteTravelHistory($travel_history_id)
    {
        // Find the travel history entry
        $travel_history = $this->shipment_information->travelHistories()->find($travel_history_id);

        // If the entry is not found, flash a message
        if (!$travel_history) {
            // Flash a message
            session()->flash('message', 'Travel history entry not found.');
            return;
        }

        // Delete the travel history entry
        $travel_history->delete();

        // Flash a message
        session()->flash('message', 'Travel history entry deleted successfully.');
    }

    // Save new travel history
    public function saveTravelHistory()
    {
        if ($this->shipment_information->travelHistories()->where('status', 'Delivered')->exists()) {
            // Display a message indicating that no further travel history can be added
            session()->flash('travel_history_message', 'A new travel history cannot be added as the shipment is already marked as delivered. To proceed, please delete the existing Delivered status entry.');
            return;
        }

        // Validate the input fields
        $this->validate([
            'travel_history_status' => 'required|string|max:255',
            'travel_history_feedback' => 'required|string|max:255',
            'travel_history_location' => 'required|string|max:255',
            'travel_history_timestamp' => 'required',
            'travel_history_map_link' => 'required',
        ]);

        // Extract the actual map link from the iframe src
        $map_link = $this->extractMapLink($this->travel_history_map_link);

        // Create a new travel history entry
        TravelHistory::create([
            'shipment_id' => $this->shipment_information->id,
            'status' => $this->travel_history_status,
            'feedback' => $this->travel_history_feedback,
            'location' => $this->travel_history_location,
            'map_link' => $map_link,
            'timestamp' => Carbon::parse($this->travel_history_timestamp)->format('Y-m-d H:i:s'),
        ]);

        // Flash a message
        session()->flash('travel_history_message', 'New travel history entry added successfully.');

        // Reset the form fields
        $this->reset([
            'travel_history_status',
            'travel_history_feedback',
            'travel_history_location',
            'travel_history_map_link',
            'travel_history_timestamp'
        ]);
    }

    // Helper function to extract the map link from iframe src
    private function extractMapLink($iframeSrc)
    {
        // Use regex to extract the URL from the iframe src
        if (preg_match('/src="([^"]+)"/', $iframeSrc, $matches)) {
            return $matches[1];  // Return the extracted map link
        }

        return null;  // Return null if no valid link found
    }

    // Render the view
    public function render()
    {
        return view('livewire.dash.manage-shipment');
    }
}
