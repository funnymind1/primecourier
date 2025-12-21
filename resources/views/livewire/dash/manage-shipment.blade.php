<!-- Main content -->
<div class="col-lg-8 col-xl-9">
    <!-- Title and offcanvas button -->
    <div class="d-flex align-items-center mb-3">
        <!-- Title -->
        <h1 class="h5 d-flex align-items-center mb-0 fw-light">
            <i class="bx bx-timer me-2"></i>Manage Shipment
        </h1>

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

        <div class="col-lg-12">
            <div class="card rounded-4 shadow border border-dashed">
                <div class="card-body pb-3">
                    <form wire:submit.prevent="modifyShipment">
                        <div class="row g-3">
                            <div class="col-lg-7">
                                <label for="recipient_name" class="form-label text-uppercase small">
                                    Recipient Name
                                    <span class="text-danger">*</span></label>
                                <input type="text" id="recipient_name"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="recipient_name" required>
                            </div>

                            <div class="col-lg-5">
                                <label for="destination" class="form-label text-uppercase small">
                                    Destination
                                    <span class="text-danger">*</span></label>
                                <input type="text" id="destination"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="destination" required>
                            </div>

                            <div class="col-lg-5">
                                <label for="shipment_date" class="form-label text-uppercase small">
                                    Shipment Date
                                    <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="shipment_date"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="shipment_date" required>
                            </div>

                            <div class="col-lg-7">
                                <label for="due_date" class="form-label text-uppercase small">
                                    Due Date
                                    <span class="text-danger">*</span></label>
                                <input type="datetime-local" id="due_date"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="due_date" required>
                            </div>

                            <div class="col-lg-7">
                                <label for="package_weight" class="form-label text-uppercase small">
                                    Package Weight (KG)
                                    <span class="text-danger">*</span></label>
                                <input type="number" step="0.01" id="package_weight"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="package_weight" required>
                            </div>

                            <div class="col-lg-5">
                                <label for="package_qty" class="form-label text-uppercase small">
                                    Package Quantity
                                    <span class="text-danger">*</span></label>
                                <input type="number" id="package_qty"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="package_qty" required>
                            </div>

                            <div class="d-flex align-items-center mt-4">
                                <button type="reset"
                                    class="btn btn-dark rounded-4 border border-secondary border-dashed me-auto d-flex align-items-center">
                                    <i class="bx bx-reset me-2"></i>Cancel
                                </button>
                                <button type="submit" class="btn btn-primary rounded-4 d-flex align-items-center">
                                    <i class="bx bx-package me-2"></i>
                                    <span class="d-none d-sm-block">Modify Shipment</span>
                                    <span class="d-lg-none">Edit Shipment</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-12 mt-4">
            <h3 class="fs-5 fw-light d-flex align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <i class="bx bx-timer me-2 fs-4"></i>Pkg. Travel History
                </div>
                <div class="d-flex align-items-center ms-auto">
                    <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#newTravelHistoryModal"
                        class="btn btn-dark rounded-4 mb-0 d-flex align-items-center border border-dashed border-secondary">
                        <i class='bx bx-add-to-queue small me-1'></i>
                        <span class="d-none d-sm-block">Add History</span>
                        <span class="d-lg-none">Add</span>
                    </a>
                </div>
            </h3>

            @if ($shipment_information->travelHistories->count() == 0)
                <div class="card card-body shadow rounded-4 border border-dashed">
                    No travel histories found!
                </div>
            @else
                <div class="row g-4 g-lg-3">
                    @foreach($shipment_information->travelHistories->reverse() as $key => $history)
                        @if($loop->first)
                            <div class="col-lg-6">
                                <div class="card h-100 bg-black rounded-4 text-white" data-bs-theme="dark">
                                    <div class="card-body pb-0">
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="btn btn-primary btn-icon btn-xs rounded-4 mb-3">
                                                    <i class="bx bx-map fs-6"></i>
                                                </div>
                                                <p class="ms-2 mb-3 fw-light text-uppercase">
                                                    {{ $history->location }}
                                                </p>
                                            </div>
                                            <a href="javascript:void(0);"
                                                class="badge ms-auto bg-primary text-white rounded-3 mb-3">
                                                <i class='bx bx-pin bx-tada fs-6'></i>
                                            </a>
                                        </div>
                                        <span
                                            class="small btn btn-xs rounded-4 border border-dashed border-primary btn-outline-primary">
                                            {{ Carbon\Carbon::parse($shipment_information->timestamp)->format('jS F Y \b\y g:i a') }}
                                        </span>
                                        <p class="mt-2 mb-3 d-flex align-items-center small">
                                            <i class='bx bx-chevrons-right me-1 text-primary fs-6'></i>
                                            {{ $history->feedback }}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent pt-0">
                                        <span
                                            class="small mb-0 btn btn-xs rounded-4 border border-dashed border-primary btn-outline-primary d-inline-flex align-items-center fw-bold me-1">
                                            <i class="bx bx-meteor bx-tada me-1 fs-6"></i>{{ $history->status }}
                                        </span>
                                        <button type="button" wire:click="deleteTravelHistory({{ $history->id }})"
                                            class="btn btn-icon btn-xs btn-white rounded-4 mb-0 ms-auto">
                                            <i class="bx bx-trash bx-tada"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-6">
                                <div class="card h-100 bg-dark rounded-4 text-white" data-bs-theme="dark">
                                    <div class="card-body pb-0">
                                        <div class="d-flex align-items-center">
                                            <div
                                                class="btn btn-outline-primary border border-dashed border-primary btn-icon btn-xs rounded-4 mb-3">
                                                <i class="bx bx-map fs-6"></i>
                                            </div>
                                            <p class="ms-2 mb-3 fw-light text-uppercase">
                                                {{ $history->location }}
                                            </p>
                                        </div>
                                        <span
                                            class="me-3 small btn btn-xs rounded-4 border border-dashed border-white btn-outline-white">{{ Carbon\Carbon::parse($history->timestamp)->format('jS F Y \b\y g:i a') }}</span>
                                        <p class="mt-2 mb-3 d-flex align-items-center small text-white">
                                            <i class='bx bx-chevrons-right me-1 fs-6'></i>
                                            {{ $history->feedback }}
                                        </p>
                                    </div>
                                    <div class="card-footer bg-transparent pt-0">
                                        <span
                                            class="small mb-0 btn btn-xs rounded-4 border border-dashed border-primary btn-outline-primary d-inline-flex align-items-center fw-bold me-1">
                                            <i class="bx bx-meteor bx-tada me-1 fs-6"></i>{{ $history->status }}
                                        </span>
                                        <button type="button" wire:click="deleteTravelHistory({{ $history->id }})"
                                            class="btn btn-icon btn-xs btn-white rounded-4 mb-0 ms-auto">
                                            <i class="bx bx-trash bx-tada"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            @endif

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newTravelHistoryModal" wire:ignore.self data-bs-backdrop="static"
        data-bs-keyboard="false" tabindex="-1" aria-labelledby="newTravelHistoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-5">
                <div class="modal-header border-bottom-0 bg-dark rounded-top-4">
                    <h1 class="modal-title small fw-normal text-white text-uppercase d-flex align-items-center"
                        id="newTravelHistoryModalLabel">
                        <i class="bx bx-add-to-queue me-2 fs-5"></i>Add New Travel History
                    </h1>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    @if(session()->has('travel_history_message'))
                        <div class="col-lg-12">
                            <div class="alert alert-secondary border border-secondary border-dashed mb-3 mt-2 rounded-4 alert-dismissible fade show"
                                role="alert">
                                <strong>Feedback!</strong> {{ session('travel_history_message') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    @endif

                    <div class="row g-3">
                        <div class="col-lg-5">
                            <label for="travel_history_status" class="form-label">Status <span
                                    class="text-danger">*</span></label>
                            <select
                                class="form-control rounded-4 border bg-body-tertiary border-dashed @error('travel_history_status') shadow border-danger @enderror"
                                id="travel_history_status" wire:model="travel_history_status" required>
                                <option value="">-- Choose Option --</option>
                                <option value="Picked up">Picked up</option>
                                <option value="In Transit">In Transit</option>
                                <option value="Delayed">Delayed</option>
                                <option value="Delivered">Delivered</option>
                            </select>
                        </div>
                        <div class="col-lg-7">
                            <label for="travel_history_feedback" class="form-label">Feedback <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control rounded-4 border bg-body-tertiary border-dashed @error('travel_history_feedback') shadow border-danger @enderror"
                                id="travel_history_feedback" wire:model="travel_history_feedback" required>
                        </div>
                        <div class="col-lg-7">
                            <label for="travel_history_location" class="form-label">Location <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control rounded-4 border bg-body-tertiary border-dashed @error('travel_history_location') shadow border-danger @enderror"
                                id="travel_history_location" wire:model="travel_history_location" required>
                        </div>
                        <div class="col-lg-5">
                            <label for="travel_history_timestamp" class="form-label">Timestamp <span
                                    class="text-danger">*</span></label>
                            <input type="datetime-local"
                                class="form-control rounded-4 border bg-body-tertiary border-dashed @error('travel_history_timestamp') shadow border-danger @enderror"
                                id="travel_history_timestamp" wire:model="travel_history_timestamp" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="travel_history_map_link" class="form-label">Map Link <span
                                    class="text-danger">*</span></label>
                            <input type="text"
                                class="form-control rounded-4 border bg-body-tertiary border-dashed @error('travel_history_map_link') shadow border-danger @enderror"
                                id="travel_history_map_link" wire:model="travel_history_map_link" required>
                        </div>
                    </div>
                </div>
                <div
                    class="modal-footer d-inline-flex align-items-center border border-dashed border-top-1 border-start-0 border-end-0 border-bottom-0">
                    <button type="button" class="btn btn-dark rounded-4 border border-secondary border-dashed me-auto"
                        data-bs-dismiss="modal"><i class="bx bx-reset me-2"></i>Cancel</button>
                    <button type="button" wire:click="saveTravelHistory" class="btn btn-primary rounded-4">
                        <i class="bx bx-save me-2"></i>Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>