<div class="col-lg-8 col-xl-9">
    <div class="d-flex align-items-center mb-3">
        <h1 class="h5 d-flex align-items-center mb-0 fw-light">
            <i class="bx bx-package me-2"></i>Create New Shipment
        </h1>
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
                    <form wire:submit.prevent="createShipment">
                        <div class="row g-3">
                            <div class="col-lg-7">
                                <label for="recipient_name" class="form-label text-uppercase small">Recipient
                                    Name<span class="text-danger">*</span></label>
                                <input type="text" id="recipient_name" autofocus
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="recipient_name" required>
                            </div>

                            <div class="col-lg-5">
                                <label for="destination" class="form-label text-uppercase small">Destination<span
                                        class="text-danger">*</span></label>
                                <input type="text" id="destination"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="destination" required>
                            </div>

                            <div class="col-lg-5">
                                <label for="shipment_date" class="form-label text-uppercase small">Shipment
                                    Date<span class="text-danger">*</span></label>
                                <input type="datetime-local" id="shipment_date"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="shipment_date" required>
                            </div>

                            <div class="col-lg-7">
                                <label for="due_date" class="form-label text-uppercase small">Due
                                    Date<span class="text-danger">*</span></label>
                                <input type="datetime-local" id="due_date"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="due_date" required>
                            </div>

                            <div class="col-lg-7">
                                <label for="package_weight" class="form-label text-uppercase small">Package
                                    Weight (KG)<span class="text-danger">*</span></label>
                                <input type="number" step="0.01" id="package_weight"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="package_weight" required>
                            </div>

                            <div class="col-lg-5">
                                <label for="package_qty" class="form-label text-uppercase small">Package
                                    Quantity<span class="text-danger">*</span></label>
                                <input type="number" id="package_qty"
                                    class="form-control rounded-4 border bg-body-tertiary border-dashed"
                                    wire:model="package_qty" required>
                            </div>

                            <div class="d-flex align-items-center mt-4">
                                <button type="reset"
                                    class="btn btn-dark border border-secondary border-dashed rounded-4 me-auto d-flex align-items-center">
                                    <i class="bx bx-reset me-2"></i>Cancel
                                </button>
                                <button type="submit" class="btn btn-primary rounded-4 d-flex align-items-center">
                                    <i class="bx bx-package me-2"></i>
                                    <span class="d-none d-sm-block">Create Shipment</span>
                                    <span class="d-lg-none">Add Shipment</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>