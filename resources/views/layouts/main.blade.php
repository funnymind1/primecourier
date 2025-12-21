<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Meta Tags -->
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ config('app.name', 'Laravel') }} | {{ $title ?? 'Page Title' }}</title>

    <meta name="author" content="{{ config('app.name', 'Laravel') }}">

    <meta name="description"
        content="Your trusted logistics company specializing in fast, secure deliveries locally and internationally.">

    <!-- Dark mode -->
    <script>
        const storedTheme = localStorage.getItem('theme')

        const getPreferredTheme = () => {
            if (storedTheme) {
                return storedTheme
            }
            return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'light'
        }

        const setTheme = function (theme) {
            if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                document.documentElement.setAttribute('data-bs-theme', 'dark')
            } else {
                document.documentElement.setAttribute('data-bs-theme', theme)
            }
        }

        setTheme(getPreferredTheme())

        window.addEventListener('DOMContentLoaded', () => {
            var el = document.querySelector('.theme-icon-active');
            if (el != 'undefined' && el != null) {
                const showActiveTheme = theme => {
                    const activeThemeIcon = document.querySelector('.theme-icon-active use')
                    const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                    const svgOfActiveBtn = btnToActive.querySelector('.mode-switch use').getAttribute('href')

                    document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                        element.classList.remove('active')
                    })

                    btnToActive.classList.add('active')
                    activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                }

                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                    if (storedTheme !== 'light' || storedTheme !== 'dark') {
                        setTheme(getPreferredTheme())
                    }
                })

                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            localStorage.setItem('theme', theme)
                            setTheme(theme)
                            showActiveTheme(theme)
                        })
                    })

            }
        })

    </script>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo-icon.svg') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet">

    <!-- Plugins CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/aos/aos.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.0/dist/JsBarcode.all.min.js"></script>

</head>

<body>

    <!-- Header START -->
    <header class="header-sticky header-absolute">
        <!-- Logo Nav START -->
        <nav class="navbar navbar-expand-xl">
            <div class="container">
                <!-- Logo START -->
                <a class="navbar-brand me-0" href="{{ route('homepage') }}">
                    <img class="light-mode-item navbar-brand-item" style="height: 55px;"
                        src="{{ asset('images/logo.svg') }}" alt="logo">
                    <img class="dark-mode-item navbar-brand-item" style="height: 55px;"
                        src="{{ asset('images/logo-light.svg') }}" alt="logo">
                </a>
                <!-- Logo END -->

                <!-- Main navbar START -->
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="navbar-nav navbar-nav-scroll dropdown-hover mx-auto">
                        <!-- Nav item -->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('homepage') ? 'active' : '' }}"
                                href="{{ route('homepage') }}">
                                <i class="bx bx-home me-2"></i>Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homepage') . '#about' }}">
                                <i class="bx bx-buildings me-2"></i>About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homepage') . '#services' }}">
                                <i class="bx bx-package me-2"></i>Services
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homepage') . '#faqs' }}">
                                <i class="bx bx-help-circle me-2"></i>FAQs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}"
                                href="{{ route('contact') }}">
                                <i class="bx bx-support me-2"></i>Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- Main navbar END -->

                <!-- Buttons -->
                <ul class="nav align-items-center dropdown-hover ms-sm-2">
                    <!-- Dark mode option START -->
                    <li class="nav-item dropdown dropdown-animation">
                        <button class="btn btn-link mb-0 px-2 lh-1" id="bd-theme" type="button" aria-expanded="false"
                            data-bs-toggle="dropdown" data-bs-display="static">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                class="bi bi-circle-half theme-icon-active fill-mode fa-fw" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                                <use href="#"></use>
                            </svg>
                        </button>

                        <ul class="dropdown-menu min-w-auto dropdown-menu-end" aria-labelledby="bd-theme">
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="light">
                                    <svg width="16" height="16" fill="currentColor"
                                        class="bi bi-brightness-high-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path
                                            d="M12 8a4 4 0 1 1-8 0 4 4 0 0 1 8 0zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                                        <use href="#"></use>
                                    </svg>Light
                                </button>
                            </li>
                            <li class="mb-1">
                                <button type="button" class="dropdown-item d-flex align-items-center"
                                    data-bs-theme-value="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-moon-stars-fill fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path
                                            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
                                        <path
                                            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
                                        <use href="#"></use>
                                    </svg>Dark
                                </button>
                            </li>
                            <li>
                                <button type="button" class="dropdown-item d-flex align-items-center active"
                                    data-bs-theme-value="auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-circle-half fa-fw mode-switch me-1" viewBox="0 0 16 16">
                                        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
                                        <use href="#"></use>
                                    </svg>Auto
                                </button>
                            </li>
                        </ul>
                    </li>
                    <!-- Dark mode option END -->

                    <!-- Sign up button -->
                    <li class="nav-item me-2 d-none d-sm-block">
                        <a href="{{ route('tracker') }}"
                            class="btn btn-sm btn-light mb-0 d-flex align-items-center border border-secondary border-dashed rounded-3">
                            <i class="bx bxs-ship fs-6 me-2"></i>Track Order
                        </a>
                    </li>
                    <!-- Buy now button -->
                    <li class="nav-item d-none d-sm-block">
                        <button class="btn btn-sm btn-primary mb-0 rounded-3">Get a Quote!</button>
                    </li>
                    <!-- Responsive navbar toggler -->
                    <li class="nav-item">
                        <button class="navbar-toggler ms-sm-3 p-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-animation">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </button>
                    </li>
                </ul>

            </div>
        </nav>
        <!-- Logo Nav END -->
    </header>
    <!-- Header END -->

    <!-- **************** MAIN CONTENT START **************** -->
    <main>

        <!-- Yeild page content -->
        {{ $slot }}

    </main>
    <!-- **************** MAIN CONTENT END **************** -->

    <!-- ======================= Footer START -->
    <footer class="bg-dark position-relative overflow-hidden mb-0 pb-0 pt-6 pt-lg-8" data-bs-theme="dark">

        <!-- SVG decoration -->
        <div class="position-absolute top-0 end-0 mt-n3 me-n4">
            <img src="{{ asset('images/elements/decoration-pattern-2.svg') }}" style="opacity:0.05;" alt="">
        </div>

        <div class="container position-relative mt-5 mt-lg-n4">
            <div class="d-lg-flex align-items-center">

                <!-- logo -->
                <a class="me-0 col-auto" href="{{ route('homepage') }}">
                    <img class="light-mode-item h-40px" src="{{ asset('images/logo.svg') }}" alt="logo">
                    <img class="dark-mode-item h-40px" src="{{ asset('images/logo-light.svg') }}" alt="logo">
                </a>

                <!-- Link block -->
                <div class="ms-auto col-auto mt-4 mt-lg-0">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-light border border-secondary border-dashed rounded-4"
                                href="https://facebook.com">
                                <i class="fab fa-fw fa-facebook-f lh-base"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-light border border-secondary border-dashed rounded-4"
                                href="https://instagram.com">
                                <i class="fab fa-fw fa-instagram lh-base"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-light border border-secondary border-dashed rounded-4"
                                href="https://x.com">
                                <i class="fab fa-fw fa-twitter lh-base"></i>
                            </a>
                        </li>
                        <li class="list-inline-item d-sm-inline-block">
                            <a class="btn btn-xs btn-icon btn-light border border-secondary border-dashed rounded-4"
                                href="https://linkedin.com">
                                <i class="fab fa-fw fa-linkedin-in lh-base"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-xs btn-icon btn-light border border-secondary border-dashed rounded-4"
                                href="https://youtube.com">
                                <i class="fab fa-fw fa-youtube lh-base"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <hr class="mt-4 mb-0">

            <!-- Bottom footer -->
            <div class="d-md-flex justify-content-between align-items-center text-center text-lg-start py-4">
                <!-- copyright text -->
                <div class="text-body" style="font-size: 13px;">
                    Copyrights ©<?= date('Y') ?> <a href="{{ route('homepage') }}">{{ config('app.name') }}</a>
                    | All rights reserved</div>
                <!-- copyright links-->
                <!-- Language selector -->
                <div class="dropdown dropup text-center text-md-end mt-3 mt-md-0 d-none d-lg-block">
                    <a class="dropdown-toggle btn btn-sm btn-light mb-0" href="javascript:void(0);" role="button"
                        id="languageSwitcher" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe me-2"></i>Language
                    </a>
                    <ul class="dropdown-menu min-w-auto" aria-labelledby="languageSwitcher">
                        <li><a class="dropdown-item me-4" href="javascript:void(0);"><img class="fa-fw me-2"
                                    src="{{ asset('images/flags/uk.svg') }}" alt="">English</a></li>
                        <li><a class="dropdown-item me-4" href="javascript:void(0);"><img class="fa-fw me-2"
                                    src="{{ asset('images/flags/gr.svg') }}" alt="">German </a></li>
                        <li><a class="dropdown-item me-4" href="javascript:void(0);"><img class="fa-fw me-2"
                                    src="{{ asset('images/flags/sp.svg') }}" alt="">French</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- ======================= Footer END -->

    <!-- Back to top -->
    <div class="back-top"></div>

    <!-- Bootstrap JS -->
    <script src="{{ asset('vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

    <!--Vendors-->
    <script src="{{ asset('vendor/ityped/index.js') }}"></script>
    <script src="{{ asset('vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Theme Functions -->
    <script src="{{ asset('js/functions.js') }}"></script>

<!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = 'd63d4b107c534a9eece5245412d6537f1f8f1a85';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
    

</body>

</html>