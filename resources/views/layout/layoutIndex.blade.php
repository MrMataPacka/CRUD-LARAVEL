<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="{{asset('build/css/beta.css')}}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Alfa+Slab+One&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@100..900&display=swap" rel="stylesheet">
    </head>

    <body>
        <header class="header">
            <div class="left-section-header">
                <img class="logo-icon-header" src="{{asset('img/icon/alien-svgrepo-com.svg')}}">
            </div>
            <div class="middle-section-header">
                <div class="header-title">
                    All Products
                </div>
                <div class="header-title">
                    Best Seller
                </div>
                <div class="header-title">
                    Brand
                </div>
                <div class="header-title">
                    Blogs
                </div>
                <div class="header-title">
                    Support
                </div>
            </div>
            <div class="right-section-header">
                <img class="right-header-icon" src="{{asset('img/icon/circle-user-regular.svg')}}">
                <img class="right-header-icon" src="{{asset('img/icon/clipboard-regular.svg')}}">
                <img class="right-header-icon" src="{{asset('img/icon/magnifying-glass-solid.svg')}}">
            </div>
        </header>

        @yield('content')

        <footer class="footer">
            <div class="left-section-footer">
                <img class="right-footer-icon" src="{{asset('img/icon/youtube-brands-.svg')}}">
                <img class="right-footer-icon" src="{{asset('img/icon/facebook-brands-.svg')}}">
                <img class="right-footer-icon" src="{{asset('img/icon/instagram-brands-.svg')}}">
            </div>

            <div class="middle-section-footer">
                <div class="footer-title">
                    Contact Us
                </div>
                <div class="footer-title">
                    About Us
                </div>
                <div class="footer-title">
                    Customer Support
                </div>
            </div>

            <div class="right-section-footer">
                <img class="logo-icon-footer" src="{{asset('img/icon/alien-svgrepo-com.svg')}}">
            </div>

        </footer>




        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>
</html>
