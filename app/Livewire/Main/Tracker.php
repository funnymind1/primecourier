<?php

namespace App\Livewire\Main;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use App\Models\Shipment;

class Tracker extends Component
{
    #[Layout('layouts.main')]
    #[Title('Advanced Shipment Tracking')]

    // Public properties
    public $shipment_information;
    public $map_link;

    // Mount the component and fetch shipment data
    public function mount()
    {
        // Retrieve tracking ID from the query string
        $tracking_id = request()->query('tracking_id');

        if ($tracking_id) {
            // Attempt to retrieve shipment data
            $this->shipment_information = $this->getShipmentData($tracking_id);

            // If no shipment data is found, flash a message and redirect
            if (!$this->shipment_information) {
                session()->flash('message', 'We were unable to find the shipment associated with the provided Tracking ID. Please verify the ID and try again. If the issue persists, kindly contact our support team for further assistance.');
                return redirect()->route('tracker');
            }
        }
    }

    /**
     * Fetch shipment data based on the tracking ID.
     *
     * @param $tracking_id
     * @return Shipment|null
     */
    private function getShipmentData($tracking_id)
    {
        // Fetch shipment data based on the tracking ID
        return Shipment::with([
            'travelHistories' => function ($query) {
                $query->orderByDesc('date');
            }
        ])->where('tracking_id', $tracking_id)->first();
    }

    /**
     * Convert weight from kg to pounds.
     *
     * @param $kg
     * @return float
     */
    private function weightConverter($kg)
    {
        // Convert weight from kg to pounds
        return $kg * 2.20462;
    }


    /**
     * Validate if the map link is a valid Google Maps URL.
     *
     * @param $map_link
     * @return bool
     */
    private function isValidMapLink($map_link)
    {
        // Validate if the map link is a valid Google Maps URL
        return filter_var($map_link, FILTER_VALIDATE_URL) && str_contains($map_link, 'google.com/maps');
    }

    public function render()
    {
        // Add weight in pounds to shipment information if available
        if ($this->shipment_information?->package_weight) {
            $this->shipment_information->weight_in_pounds = $this->weightConverter($this->shipment_information->package_weight);
        }

        // Add map link to shipment information
        $this->map_link = $this->shipment_information?->travelHistories->last()->map_link ?? null;
        $this->map_link = $this->isValidMapLink($this->map_link) ? $this->map_link : null;

        // Render the view with the shipment information
        return view('livewire.main.tracker');
    }
}
