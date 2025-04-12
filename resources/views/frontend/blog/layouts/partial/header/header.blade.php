@php
    $website_settings = DB::table('website_settings')->first();
    $route = Route::current()->getName();
@endphp

<header>
    <div id="sticky-header" class="menu__area transparent-header">
        <div class="container custom-container">
            <div class="row">
                <div class="col-12">
                    <div class="mobile__nav__toggler"><i class="fas fa-bars"></i></div>
                    <div class="menu__wrap">
                        <div class="header__btn d-none d-md-block">
                            <a href="{{ url('/') }}" class="btn">BACK TO PORFOLIO PAGE</a>
                        </div>
                    </div>
                    <!-- Mobile Menu  -->
                    <div class="mobile__menu">
                        <nav class="menu__box">
                            <div class="close__btn"><i class="fal fa-times"></i></div>
                            <div class="nav-logo">
                                <h2>{{ $website_settings->website_name ?? '' }}</h2>

                            </div>
                            <div class="menu__outer">
                                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                            </div>
                            <div class="social-links">
                                <ul class="clearfix">
                                    <li><a href="{{ $socials->linkedin ?? '#' }}"><i class="fab fa-linkedin-in"></i></a>
                                    </li>
                                    <li><a href="{{ $socials->facebook ?? '#' }}"><i class="fab fa-facebook-f"></i></a>
                                    </li>
                                    <li><a href="{{ $socials->instagram ?? '#' }}"><i class="fab fa-instagram"></i></a>
                                    </li>
                                    <li><a href="{{ $socials->twitter ?? '#' }}"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="{{ $socials->github ?? '#' }}"><i class="fab fa-github"></i></a></li>
                                    <li><a href="{{ $socials->youtube ?? '#' }}"><i class="fab fa-youtube"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="menu__backdrop"></div>
                    <!-- End Mobile Menu -->
                </div>
            </div>
        </div>
    </div>
</header>
