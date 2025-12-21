<!-- Main content -->
<div class="col-lg-8 col-xl-9">
    <!-- Title and offcanvas button -->
    <div class="d-flex align-items-center mb-3">
        <!-- Title -->
        <h1 class="h5 d-flex align-items-center mb-0 fw-light"><i class="bx bx-server me-2"></i>Manage Platform</h1>

        <!-- Advanced filter responsive toggler START -->
        <button class="btn btn-primary btn-sm d-lg-none rounded-3 flex-shrink-0 ms-auto" type="button"
            data-bs-toggle="offcanvas" data-bs-target="#offcanvasSidebar" aria-controls="offcanvasSidebar">
            <i class="fas fa-sliders-h"></i> Menu
        </button>
        <!-- Advanced filter responsive toggler END -->

    </div>

    <div class="row g-3">
        @if(session()->has('message'))
            <div class="col-lg-12">
                <div class="alert alert-secondary border border-secondary border-dashed mb-2 rounded-4 alert-dismissible fade show"
                    role="alert">
                    <strong>Feedback!</strong> {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        <div class="col-lg-4">
            <div class="card bg-black rounded-4">
                <div class="card-body p-3 d-flex align-items-center">
                    <p class="mb-0 text-light fw-bold">Total Shipments</p>
                    <span class="btn btn-primary ms-auto d-flex btn-sm align-items-center rounded-4 mb-0">
                        <i class="bx bx-package bx-flashing fs-6 me-1"></i>{{ $total_shipments }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-dark rounded-4">
                <div class="card-body p-3 d-flex align-items-center">
                    <p class="mb-0 text-light fw-bold">Total Deliveries</p>
                    <span class="btn btn-primary ms-auto btn-sm d-flex align-items-center rounded-4 mb-0">
                        <i class="bx bx-meteor bx-tada fs-6 me-1"></i>{{ $total_deliveries }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-dark rounded-4">
                <div class="card-body p-3 d-flex align-items-center">
                    <p class="mb-0 text-light fw-bold">Transit Results</p>
                    <span class="btn btn-primary ms-auto btn-sm d-flex align-items-center rounded-4 mb-0">
                        <i class="bx bx-meteor bx-tada fs-6 me-1"></i>{{ $total_in_transit }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-4">
            <div class="card card-body rounded-4 border shadow pb-0 px-0 pt-0 border-dashed">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr class="text-uppercase small">
                                <th class="ps-4" scope="col">#</th>
                                <th scope="col">Tracking ID</th>
                                <th scope="col">Recipient</th>
                                <th scope="col">Destination</th>
                                <th scope="col">Due Date</th>
                                <th scope="col">Reference No.</th>
                                <th scope="col" class="text-center">Modifiers</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider">
                            @if ($shipments->isEmpty())
                                <tr>
                                    <td colspan="7" class="ps-4">No records found!</td>
                                </tr>
                            @else
                                @foreach ($shipments as $shipment)
                                    <tr>
                                        <th scope="row" class="ps-4">
                                            {{ ($shipments->currentPage() - 1) * $shipments->perPage() + $loop->iteration }}.
                                        </th>
                                        <td class="fw-light">{{ $shipment->tracking_id }}</td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 130px;">
                                                {{ $shipment->recipient_name }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="d-inline-block text-truncate" style="max-width: 130px;">
                                                {{ $shipment->destination }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($shipment->due_date)->format('jS M Y') }}
                                        </td>
                                        <td>{{ $shipment->reference_number }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="{{ route('manage-shipment') }}?tracking_id={{ urlencode($shipment->tracking_id) }}"
                                                    class="badge bg-primary rounded-2 me-2">
                                                    <i class="bx bx-edit me-1"></i>Manage
                                                </a>
                                                <button type="button" class="badge border-0 bg-dark rounded-2"
                                                    wire:click="deleteShipment({{ $shipment->id }})">
                                                    <i class="bx bx-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="container pt-4">
                    <!-- Pagination Links -->
                    {{ $shipments->links() }}
                </div>
            </div>
        </div>
    </div>
</div>