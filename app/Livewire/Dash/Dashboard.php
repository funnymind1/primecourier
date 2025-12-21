<?php

namespace App\Livewire\Dash;

use App\Models\Shipment;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    #[Layout('layouts.dash')]
    #[Title('Dashboard')]

    public $total_shipments;
    public $total_deliveries;
    public $total_in_transit;

    // Mount the component
    public function mount()
    {
        $this->total_shipments = $this->getTotalShipmentsCount();
        $this->total_deliveries = $this->getTotalDeliveriesCount();
        $this->total_in_transit = $this->getTotalInTransitCount();
    }

    // Method to delete a shipment
    public function deleteShipment($shipment_id)
    {
        // Find the shipment by ID and delete it
        $shipment = Shipment::find($shipment_id);

        if ($shipment) {
            $shipment->delete();

            // Recalculate the totals after deletion
            $this->total_shipments = $this->getTotalShipmentsCount();
            $this->total_deliveries = $this->getTotalDeliveriesCount();
            $this->total_in_transit = $this->getTotalInTransitCount();

            // Optionally, flash a message to the session (optional)
            session()->flash('message', 'The shipment has been successfully deleted.');
        }
    }

    /**
     * Get the total shipment count
     *
     * @return int
     */
    private function getTotalShipmentsCount(): int
    {
        return Shipment::count();
    }

    /**
     * Get the total deliveries count
     *
     * @return int
     */
    private function getTotalDeliveriesCount(): int
    {
        return Shipment::whereHas('travelHistories', function ($query) {
            $query->where('status', 'Delivered');
        })->count();
    }

    /**
     * Get the total shipments in transit count (excluding delivered shipments)
     *
     * @return int
     */
    private function getTotalInTransitCount(): int
    {
        return Shipment::whereHas('travelHistories', function ($query) {
            $query->where('status', 'In Transit');
        })->whereDoesntHave('travelHistories', function ($query) {
            $query->where('status', 'Delivered');
        })->count();
    }

    /**
     * Fetch all shipments with pagination
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function fetchShipments()
    {
        return Shipment::paginate(8); // Adjust the number of items per page as needed
    }

    public function render()
    {
        return view('livewire.dash.dashboard', [
            'shipments' => $this->fetchShipments(),
        ]);
    }
}
