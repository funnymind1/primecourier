<div>
    <!-- ======================= Main hero START -->
    <section class="pt-xl-8 pb-6">
        <div class="container">
            <div class="row g-4 g-xxl-5">
                <div class="col-xl-9 mx-auto">
                    <!-- Image -->
                    <img src="{{ asset('images/bg/02.jpg') }}" class="rounded-5 shadow" alt="contact-bg">

                    <!-- Contact form START -->
                    <div class="row mt-n5 mt-sm-n7 mt-md-n8">
                        <div class="col-11 col-lg-9 mx-auto">
                            <div class="card shadow p-4 p-sm-5 p-md-6 rounded-5 border border-dashed">
                                <!-- Card header -->
                                <div class="card-header border-bottom px-0 pt-0 pb-4">
                                    <!-- Breadcrumb -->
                                    <nav class="mb-3" aria-label="breadcrumb">
                                        <ol class="breadcrumb breadcrumb-dots pt-0">
                                            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Contact us</li>
                                        </ol>
                                    </nav>
                                    <!-- Title -->
                                    <h1 class="mb-3 h3 fw-light">Get in touch with customer support</h1>
                                    <p class="mb-0">When you have a question, we’re here. <a
                                            href="mailto:{{ $_ENV['MAIL_FROM_ADDRESS'] }}">{{ $_ENV['MAIL_FROM_ADDRESS'] }}</a>
                                    </p>
                                </div>

                                <!-- Card body & form -->
                                <form class="card-body px-0 pb-0 pt-5 needs-validation" novalidate>
                                    <!-- Name -->
                                    <div class="input-floating-label form-floating mb-4">
                                        <input type="text"
                                            class="form-control rounded-4 border border-dashed bg-transparent"
                                            id="floatingName" placeholder="Password" required>
                                        <label for="floatingName">Your name</label>
                                    </div>
                                    <!-- Email -->
                                    <div class="input-floating-label form-floating mb-4">
                                        <input type="email"
                                            class="form-control rounded-4 border border-dashed bg-transparent"
                                            id="floatingInput" placeholder="name@example.com" required>
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <!-- Number -->
                                    <div class="input-floating-label form-floating mb-4">
                                        <input type="text"
                                            class="form-control rounded-4 border border-dashed bg-transparent"
                                            id="floatingNumber" placeholder="Password" required>
                                        <label for="floatingNumber">Phone number</label>
                                    </div>
                                    <!-- Message -->
                                    <div class="input-floating-label form-floating mb-4">
                                        <textarea class="form-control rounded-4 border border-dashed bg-transparent"
                                            placeholder="Leave a comment here" id="floatingTextarea2"
                                            style="height: 100px" required></textarea>
                                        <label for="floatingTextarea2">Message</label>
                                    </div>
                                    <!-- Button -->
                                    <button class="btn btn-lg btn-primary mb-0 rounded-4">Send a message</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Contact form END -->
                </div>
            </div> <!-- Row END -->
        </div>
    </section>
    <!-- ======================= Main hero END -->

    <!-- ======================= Contact info & Map START -->
    <Section class="py-0 mb-6">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-3 g-4">
                <!-- Address info -->
                <div class="col">
                    <div class="card card-body rounded-4 border-dashed bg-light border p-sm-5">
                        <!-- Icon -->
                        <div class="mb-4"><i class="bi bi-geo-alt fa-xl text-primary"></i></div>
                        <!-- Title -->
                        <h6 class="mb-4">Office Address</h6>
                        <!-- Office item -->
                        <div class="d-flex align-items-center mb-2">
                            <!-- Avatar -->
                            <div class="avatar avatar-xxs me-2">
                                <img class="avatar-img rounded-circle" src="{{ asset('images/flags/us.svg') }}"
                                    alt="avatar">
                            </div>
                            <span class="heading-color fw-semibold mb-0">US office:</span>
                        </div>
                        <address class="mb-0">1421 Coburn Hollow Road Metamora, Near Center Point, IL 61548.</address>
                    </div>
                </div>

                <!-- Email info -->
                <div class="col">
                    <div class="card card-body rounded-4 border-dashed bg-light border p-sm-5">
                        <!-- Icon -->
                        <div class="mb-4"><i class="bi bi-envelope fa-xl text-primary"></i></div>
                        <!-- Title -->
                        <h6 class="mb-3">Email us</h6>
                        <p>We're on top of things and aim to respond to all inquiries within 24 hours.</p>
                        <a href="mailto:{{ $_ENV['MAIL_FROM_ADDRESS'] }}"
                            class="heading-color text-primary-hover text-decoration-underline mb-0">
                            {{ $_ENV['MAIL_FROM_ADDRESS'] }}
                        </a>
                    </div>
                </div>

                <!-- Contact info -->
                <div class="col">
                    <div class="card card-body rounded-4 border-dashed bg-light border p-sm-5">
                        <!-- Icon -->
                        <div class="mb-4"><i class="bi bi-telephone fa-xl text-primary"></i></div>
                        <!-- Title -->
                        <h6 class="mb-3">Call us</h6>
                        <p>Let's work together towards a common goal - get in touch!</p>
                        <a href="tel:{{ $_ENV['PHONE_NUMBER'] }}"
                            class="heading-color text-primary-hover text-decoration-underline mb-0">{{ $_ENV['PHONE_NUMBER'] }}</a>
                    </div>
                </div>

            </div> <!-- Row END -->
        </div>

    </Section>
    <!-- ======================= Contact info & Map END -->
</div>