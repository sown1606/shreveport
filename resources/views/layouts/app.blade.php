<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Digital Dog Direct: Direct Mail, Digital Printing, &amp; Marketing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/preview.css') }}">
    <link href="/digitalDogDirectAssets/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/wow_book.css') }}"/>
    <script src="{{ asset('js/modernizr-1.6.min.js') }}"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script>!window.jQuery && document.write(unescape('%3Cscript src="{{ asset('js/jquery-1.9.1.min.js') }}"%3E%3C/script%3E'))</script>
    <link href="/weekender_assets/css/modal_style.css" rel="stylesheet">
    <style>
        @auth
        .content-overlay {
            color: black;
            width: 100%;
            padding: 0;
        }
        @endauth
        @guest
        .content-overlay {
            color: black;
            width: 100%;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        @endguest
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="https://www.digitaldogdirect.com/">
            <img src="/digitalDogDirectAssets/DigitalDogDirect_Logo_NoDogPNG.avif" alt="Digital Dog Direct Logo"
                 style="object-fit:cover">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://www.digitaldogdirect.com/">HOME</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDropdownMenuLink1" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        TECHNOLOGY
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/online-portal-solutions">Online
                                Portal Solutions</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/integrated-fulfillment">Integrated
                                Fulfillment</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/business-automation">Business
                                Automation</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/content-management">Content
                                Management</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/marketing-services">Marketing
                                Services</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDropdownMenuLink2" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        SERVICES
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/mailing-services">Mailing
                                Services</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/digital-printing">Digital
                                Printing</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/security-and-compliance">Security
                                and Compliance</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDropdownMenuLink3" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        INDUSTRIES
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/healthcare">Healthcare</a>
                        </li>
                        <li><a class="dropdown-item"
                               href="https://www.digitaldogdirect.com/copy-of-healthcare-solutions">Gaming &amp;
                                Hospitality</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/financial-services">Financial
                                Services</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/retail-ecommerce">Retail
                                &amp; E-Commerce</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/insurance">Insurance</a>
                        </li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/nonprofit">Nonprofit</a>
                        </li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/political">Political</a>
                        </li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/higher-education">Higher
                                Education</a></li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link " href="#" id="navbarDropdownMenuLink4" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        ABOUT US
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink4">
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/our-mission">Our Mission</a>
                        </li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/meet-the-team">Meet The
                                Team</a></li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/contact-us">Contact Us</a>
                        </li>
                        <li><a class="dropdown-item" href="https://www.digitaldogdirect.com/copy-of-meet-the-team-1">Join
                                Our Team</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="video-container">
    @guest
    <video id="video-background" autoplay loop muted playsinline>
        <source src="/digitalDogDirectAssets/file.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    @endguest
    <div class="content-overlay">
        @yield('content')  </div>
</div>

<footer class="footer">
    <div class="container">
        <p>QUICK CONTACT</p>
        <p>
            Digital Dog Direct<br>
            200 Ludlow Drive, Building E<br>
            Ewing, NJ 08638<br>
            <a href="tel:+1-609-882-3444">609-882-3444</a>
        </p>
        <p><a href="https://www.digitaldogdirect.com/contact-us">Contact Us</a></p>
        <p>© 2024 Digital Dog Direct LLC</p>
    </div>
</footer>
<script src="{{ asset('wow_book.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.body.style.visibility = "visible";
        document.body.style.opacity = "1";
    });
</script>

</body>
</html>
