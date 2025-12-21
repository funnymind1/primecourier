<div>
    <!-- ======================= Testimonials START -->
    <section class="pb-7">
        <div class="container pt-4 pt-lg-0 mt-1">
            <div class="row">

                <div class="col-lg-12">
                    @if(session()->has('message'))
                        <div class="alert alert-secondary border border-secondary border-dashed mb-4 rounded-4 alert-dismissible fade show"
                            role="alert">
                            <strong>Feedback!</strong> {{ session('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>

                <div class="col-lg-12">
                    <div class="card rounded-4 bg-body-tertiary">
                        <div class="card-body">
                            <!-- Form START -->
                            <form wire:submit.prevent="login">

                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <!-- Email -->
                                        <div class="input-floating-label form-floating">
                                            <input type="email" class="form-control border border-dashed rounded-4"
                                                id="floatingInput" placeholder="name@example.com"
                                                wire:model="email_address">
                                            <label for="floatingInput">Email address</label>
                                            @error('email_address') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <!-- Password -->
                                        <div class="input-floating-label form-floating position-relative">
                                            <input type="password"
                                                class="form-control border border-dashed rounded-4 fakepassword pe-6"
                                                id="psw-input" placeholder="Enter your password" wire:model="password">
                                            <label for="floatingInput">Password</label>
                                            <span class="position-absolute top-50 end-0 translate-middle-y p-0 me-2">
                                                <i class="fakepasswordicon fas fa-eye-slash cursor-pointer p-2"></i>
                                            </span>
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-dark mb-0 mt-3 rounded-4 d-flex align-items-center"
                                    type="submit">
                                    Access Dashboard<i class="bx bx-log-in-circle ms-2"></i>
                                </button>
                            </form>
                            <!-- Form END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= Testimonials END -->
</div>