
<!-- Include Bootstrap JavaScript -->

<!-- Include animate.css -->
<style>
    /* ... Other CSS rules ... */

    /* Media query for mobile devices (up to 767px) */
    @media (max-width: 767px) {
        .site-navigation {
            display: none;
            position: fixed;
            top: 0;
            right: 0;
            width: 100%;
            height: 100%;
            background-color: #fff;
            padding: 20px;
            z-index: 999;
        }

        .menu-open .site-navigation {
            display: block;
        }

        /* Show the menu toggle icon in mobile */
        .site-menu-toggle {
            display: block;
        }

        /* Hide the desktop menu in mobile */
        .d-lg-block {
            display: none;
        }
    }
</style>


<header class="site-navbar py-4" role="banner">

    <div class="container">
        <div class="d-flex align-items-center">
            <div class="site-logo">
                <h2><a href="{{URL('/')}}" class="nav-link">RUGBY</a></h2>
                {{-- <img src="{{asset('assets/images/logo.png')}}" alt="Logo"> --}}
            </div>
            <div class="ml-auto">
                <nav class="site-navigation position-relative text-right" role="navigation">
                    <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="{{URL('/')}}" class="nav-link"
                                style=" transition: background-color 0.3s ease;">Home</a></li>
                        <li><a href="{{URL('/matches')}}" class="nav-link">Matches</a></li>
                        <li><a href="{{URL('/players')}}" class="nav-link">Players</a></li>
                        <li><a href="{{URL('/contact')}}" class="nav-link">Contact</a></li>

                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->first_name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item nav-link" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                                <a href="{{URL('/profile')}}" class="dropdown-item nav-link">Profile</a>
                                <a href="{{URL('/myPicks')}}" class="dropdown-item nav-link">My Picks</a>
                            </div>
                        </li>
                        @else
                        <li><a href="{{URL('/login')}}" class="nav-link">Login</a></li>
                        <li><a href="{{URL('/register')}}" class="nav-link">Register</a></li>
                        @endif
                    </ul>
                 <!-- Add the class "site-menu-toggle" to the menu toggle link -->
                 
                </nav>
                <a href="#" class="d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black float-right text-white">
                    <span class="icon-menu h3 text-white"></span>
                </a>

             <!-- Add the class "menu-toggle" to the menu toggle link -->

            </div>
            <script>
    $(document).ready(function () {
        $('.site-menu .nav-link').hover(
            function () {
                $(this).addClass('animate__animated animate__fadeIn');
            },
            function () {
                $(this).removeClass('animate__animated animate__fadeIn');
            }
        );

        // Handle the click and touchstart events for the menu toggle
        $('.site-menu-toggle').on('click touchstart', function (event) {
            event.preventDefault();
            $('body').toggleClass('menu-open');
        });
    });
</script>




        </div>
    </div>
</header>
