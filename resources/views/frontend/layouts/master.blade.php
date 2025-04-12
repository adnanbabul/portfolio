<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.partial.header.header')
@php
    $animations = ['fade_from_left', 'fade_from_bottom', 'fade_from_top', 'fade_from_right'];

@endphp

<body class="home6-page">

    <div class="page-loader">
        <div class="bounceball"></div>
    </div>

    <span class="icon-menu">
        <span class="bar"></span>
        <span class="bar"></span>
    </span>

    <div class="global-color">
        <span class="setting-toggle">
            <i class="las la-cog"></i>
        </span>
        <div class="inner">
            <div class="overlay"></div>
            <div class="global-color-option">
                <span class="close-settings">
                    <i class="las la-times"></i>
                </span>
                <h2>Configuration</h2>
                <div class="global-color-option-inner">
                    <p>Colors</p>
                    <div class="color-boxed">
                        <a href="#" class="clr-active" onclick="color1();"></a>
                        <a href="#" onclick="color2();"></a>
                        <a href="#" onclick="color3();"></a>
                        <a href="#" onclick="color4();"></a>
                        <a href="#" onclick="color5();"></a>
                        <a href="#" onclick="color6();"></a>
                        <a href="#" onclick="color7();"></a>
                        <a href="#" onclick="color8();"></a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="responsive-sidebar-menu">
        <div class="overlay"></div>
        <div class="sidebar-menu-inner">
            <div class="menu-wrap">
                <p>Menu</p>
                <ul class="menu scroll-nav-responsive d-flex">
                    <li>
                        <a class="scroll-to" href="#home">
                            <i class="las la-home"></i> <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#about">
                            <i class="lar la-user"></i> <span>About</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#experience">
                            <i class="las la-briefcase"></i> <span>Experience</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#education">
                            <i class="las la-briefcase"></i> <span>Education</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#services">
                            <i class="las la-stream"></i> <span>Services</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#skills">
                            <i class="las la-shapes"></i> <span>Skills</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#portfolio">
                            <i class="las la-grip-vertical"></i> <span>Portfolios</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#testimonial">
                            <i class="lar la-comment"></i> <span>Testimonial</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" target="_blank" href="{{ route('blog') }}">
                            <i class="las la-blog"></i> <span>Blog</span>
                        </a>
                    </li>
                    <li>
                        <a class="scroll-to" href="#contact">
                            <i class="las la-envelope"></i> <span>Contact</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="sidebar-social">
                <p>Social</p>
                <ul class="social-links d-flex align-items-center">
                    <li>
                        <a href="#"><i class="lab la-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="lab la-dribbble"></i></a>
                    </li>
                    <li>
                        <a href="#"><i class="lab la-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <ul class="menu scroll-nav d-flex">
        <li>
            <a class="scroll-to" href="#home">
                <span>Home</span> <i class="las la-home"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#about">
                <span>About</span> <i class="lar la-user"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#experience">
                <span>Experience</span> <i class="las la-briefcase"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#education">
                <span>Education</span> <i class="las la-book"></i>
            </a>
        </li>
        <li>
            <a href="#services">
                <span>Services</span> <i class="las la-stream"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#skills">
                <span>Skills</span> <i class="las la-shapes"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#portfolio">
                <span>Portfolios</span> <i class="las la-grip-vertical"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#testimonial">
                <span>Testimonial</span> <i class="lar la-comment"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" target="_blank" href="{{ route('blog') }}">
                <span>Blog</span> <i class="las la-blog"></i>
            </a>
        </li>
        <li>
            <a class="scroll-to" href="#contact">
                <span>Contact</span> <i class="las la-envelope"></i>
            </a>
        </li>
    </ul>


    <div class="left-sidebar">
        <div class="sidebar-header d-flex align-items-center justify-content-between">


            <span class="text-white">{{ $site_settings->website_name ?? '' }}</span>
            <ul class="social-profile d-flex align-items-center flex-wrap justify-content-center">
                <li>
                    <i style="color: #28e98c" class="las la-crown"></i>
                </li>
            </ul>
            <span class="text-white">{{ $site_settings->job_title ?? '' }}</span>
        </div>


        <img class="me" src="{{ asset($site_settings->profile_image) ?? 'Profile' }}" alt="profile">

        <h4 class="text-center text-white">{{ $site_settings->main_email ?? $site_settings->support_email }}</h4>
        <h5 class="text-center text-white">{{ $site_settings->phone_one ?? $site_settings->two }}</h5>



        <address class="font-12 text-white">{{ $site_settings->address ?? '' }}</address>

        <p class="copyright">&copy; 2024 {{ $site_settings->website_name ?? '' }}. All Rights Reserved</p>
        <ul class="social-profile d-flex align-items-center flex-wrap justify-content-center">
            <li>
                <a target="_blank" href="{{ $socials->linkedin ?? '#' }}"><i class="lab la-linkedin"></i></a>
            </li>
            <li>
                <a target="_blank" href="{{ $socials->facebook ?? '#' }}"><i class="lab la-facebook"></i></a>
            </li>
            <li>
                <a target="_blank" href="{{ $socials->instagram ?? '#' }}"><i class="lab la-instagram"></i></a>
            </li>
            <li>
                <a target="_blank" href="{{ $socials->github ?? '#' }}"><i class="lab la-github"></i></a>
            </li>
            <li>
                <a target="_blank" href="{{ $socials->twitter ?? '#' }}"><i class="lab la-twitter"></i></a>
            </li>
        </ul>
        <a href="#" class="theme-btn">
            <i class="las la-envelope"></i> Hire Me!
        </a>
    </div>

    <main class="drake-main" style="padding-top: 75px">
        <div id="smooth-wrapper">
            <div id="smooth-content">

                <div class="left-sidebar">

                    <div class="sidebar-header d-flex align-items-center justify-content-between">
                        <span class="text-white">{{ $site_settings->website_name ?? '' }}</span>
                        <span class="designation">{{ $site_settings->job_title ?? '' }}</span>
                    </div>
                    <img class="me" src="{{ asset($site_settings->profile_image) ?? 'Profile' }}"
                        alt="Me">
                    <h2 class="email">{{ $site_settings->main_email ?? $site_settings->support_email }}</h2>
                    <h2 class="address">{{ $site_settings->phone_one ?? $site_settings->two }}</h2>
                    <p class="copyright">&copy; 2022 {{ $site_settings->website_name ?? '' }}. All Rights Reserved</p>
                    <ul class="social-profile d-flex align-items-center flex-wrap justify-content-center">

                        <li>
                            <a target="_blank" href="{{ $socials->linkedin ?? '#' }}"><i
                                    class="lab la-linkedin"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $socials->facebook ?? '#' }}"><i
                                    class="lab la-facebook"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $socials->instagram ?? '#' }}"><i
                                    class="lab la-instagram"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $socials->github ?? '#' }}"><i
                                    class="lab la-github"></i></a>
                        </li>
                        <li>
                            <a target="_blank" href="{{ $socials->twitter ?? '#' }}"><i
                                    class="lab la-twitter"></i></a>
                        </li>

                    </ul>
                    <a href="#" class="theme-btn">
                        <i class="las la-envelope"></i> Hire Me!
                    </a>
                </div>

                <section class="hero-section page-section scroll-to-page" id="home">

                    <div class="custom-container">
                        <div class="hero-content content-width">
                            <div class="section-header">
                                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-home"></i> Introduce
                                </h4>
                                <h1 class="scroll-animation" data-animation="fade_from_bottom">Say Hi from
                                    <span style="color: #2aee8f">{{ $site_settings->website_name ?? '' }}</span>,
                                    {{ $site_settings->job_title ?? '' }}
                                </h1>
                            </div>
                            <p class="scroll-animation" data-animation="fade_from_bottom">{{ $about->short_title }}
                            </p>
                            <a href="#portfolio" class="go-to-project-btn scroll-to scroll-animation"
                                data-animation="rotate_up">
                                <img src="{{ asset('frontend/assets/images/round-text.png') }}" alt="">
                                <i class="las la-arrow-down"></i>
                            </a>



                            <div class="facts d-flex">
                                <div class="left scroll-animation" data-animation="fade_from_left">
                                    <h1>{{ $total_experience_years . '+' ?? '0' }}</h1>
                                    <p>Years of <br>Experience</p>
                                </div>
                                <div class="right scroll-animation" data-animation="fade_from_right">
                                    <h1>{{ $about->total_project }}+</h1>
                                    <p>projects completed on <br>15 countries</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="about-area page-section scroll-to-page" id="about">
                    <div class="custom-container">
                        <div class="about-content content-width">
                            <div class="section-header">
                                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                    <i class="lar la-user"></i> About
                                </h4>
                                <h1 class="scroll-animation" data-animation="fade_from_bottom">
                                    {{ $site_settings->job_title ?? '' }}
                                </h1>
                            </div>
                            <p class="scroll-animation " data-animation="fade_from_bottom">
                                {!! $about->logn_Description !!}</p>
                        </div>
                    </div>
                </section>


                <section class="resume-area page-section scroll-to-page" id="experience">
                    <div class="custom-container">
                        <div class="resume-content content-width">
                            <div class="section-header">

                                <h1 class="scroll-animation" data-animation="fade_from_bottom">
                                    <span>Experience</span>
                                </h1>
                            </div>

                            <div class="resume-timeline">
                                @foreach ($experiences as $experience)
                                    @php
                                        $randomAnimation = $animations[array_rand($animations)];
                                    @endphp
                                    <div class="item scroll-animation" data-animation="{{ $randomAnimation }}">
                                        <span class="date">
                                            {{ $experience->start_date . ' - ' . ($experience->end_date ?? 'Present') }}
                                        </span>
                                        <h2>{{ $experience->job_title }}</h2>
                                        <h3>{{ $experience->company }}</h3>
                                        <p> {!! $experience->responsibilities !!}</p>
                                    </div>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </section>
                {{-- Education --}}
                <section class="resume-area page-section scroll-to-page" id="education">
                    <div class="custom-container">
                        <div class="resume-content content-width">
                            <div class="section-header">

                                <h1 class="scroll-animation" data-animation="fade_from_bottom">
                                    <span>Educations</span>
                                </h1>
                            </div>

                            <div class="resume-timeline">
                                @foreach ($educations as $education)
                                    @php
                                        $randomAnimation = $animations[array_rand($animations)];
                                    @endphp
                                    <div class="item scroll-animation" data-animation="{{ $randomAnimation }}">
                                        <span
                                            class="date">{{ $education->start_date . ' - ' . $education->end_date }}</span>
                                        <h2>{{ $education->degree_name }}</h2>
                                        <h3>{{ $education->institute_name }}</h3>
                                        <p class="text-white">{{ $education->location }}</p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </section>


                <section class="services-area page-section scroll-to-page" id="services">
                    <div class="custom-container">
                        <div class="services-content content-width">
                            <div class="section-header">
                                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-stream"></i> Services
                                </h4>
                                <h1 class="scroll-animation" data-animation="fade_from_bottom">My
                                    <span>Specializations</span>
                                </h1>
                            </div>

                            <div class="services-items">
                                <div class="service-item scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-bezier-curve"></i>
                                    <h2>Website Design</h2>
                                    <p>I created digital products with unique ideas use Figma & Framer</p>
                                    <span class="projects">24 Projects</span>
                                </div>
                                <div class="service-item scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-code"></i>
                                    <h2>Development</h2>
                                    <p>I build website go live with Framer, Webflow or WordPress</p>
                                    <span class="projects">126 Projects</span>
                                </div>
                                <div class="service-item scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-bezier-curve"></i>
                                    <h2>SEO/Marketing</h2>
                                    <p>Increase the traffic for your website with SEO optimized</p>
                                    <span class="projects">8 Projects</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>


                <section class="skills-area page-section scroll-to-page" id="skills">
                    <div class="custom-container">
                        <div class="skills-content content-width">
                            <div class="section-header">
                                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-shapes"></i> my skills
                                </h4>
                                <h1 class="scroll-animation" data-animation="fade_from_bottom">My
                                    <span>Advantages</span>
                                </h1>
                            </div>
                            <div class="row my_skills">
                                @foreach ($skills as $skill)
                                    <div class="my_skills-container">
                                        <div class="my_skill">
                                            <div class="my_skill-text">
                                                <b>{{ $skill->name }}</b>
                                            </div>
                                            <div class="progress-bar">
                                                <div class="progress-fill" style="width: {{ $skill->percentage }}%;">
                                                </div>
                                            </div>
                                            <div class="my_skill-percentage">
                                                <b>{{ $skill->percentage }}%</b>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>
                </section>


                <section class="portfolio-area page-section scroll-to-page" id="portfolio">
                    <div class="custom-container">
                        <div class="portfolio-content content-width">
                            <div class="section-header">
                                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-grip-vertical"></i> portfolio
                                </h4>
                                <h1 class="scroll-animation" data-animation="fade_from_bottom">Featured
                                    <span>Projects</span>
                                </h1>
                            </div>

                            <div class="row portfolio-items">
                                <div class="col-md-12 scroll-animation" data-animation="fade_from_bottom">
                                    <div class="portfolio-item portfolio-full">
                                        <div class="portfolio-item-inner">
                                            <a href="{{ asset('frontend/assets/images/portfolio1.jpg') }}"
                                                data-lightbox="example-1">
                                                <img src="{{ asset('frontend/assets/images/portfolio1.jpg') }}"
                                                    alt="Portfolio">
                                            </a>

                                            <ul class="portfolio-categories">
                                                <li>
                                                    <a href="#">Figma</a>
                                                </li>
                                                <li>
                                                    <a href="#">Framer</a>
                                                </li>
                                                <li>
                                                    <a href="#">WordPress</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2><a href="#">Bureau - Architecture Studio Website</a></h2>
                                    </div>
                                </div>

                                <div class="col-md-6 scroll-animation" data-animation="fade_from_left">
                                    <div class="portfolio-item portfolio-half">
                                        <div class="portfolio-item-inner">
                                            <a href="{{ asset('frontend/assets/images/portfolio2.jpg') }}"
                                                data-lightbox="example-1">
                                                <img src="{{ asset('frontend/assets/images/portfolio2.jpg') }}"
                                                    alt="Portfolio">
                                            </a>

                                            <img src="{{ asset('frontend/assets/images/portfolio2.jpg') }}"
                                                alt="Portfolio">

                                            <ul class="portfolio-categories">
                                                <li>
                                                    <a href="#">WordPress</a>
                                                </li>
                                                <li>
                                                    <a href="#">Larevel/PHP</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2><a href="#">Moonex WordPress Theme</a></h2>
                                    </div>
                                </div>

                                <div class="col-md-6 scroll-animation" data-animation="fade_from_right">
                                    <div class="portfolio-item portfolio-half">
                                        <div class="portfolio-item-inner">
                                            <a href="{{ asset('frontend/assets/images/portfolio3.jpg') }}"
                                                data-lightbox="example-1">
                                                <img src="{{ asset('frontend/assets/images/portfolio3.jpg') }}"
                                                    alt="Portfolio">
                                            </a>

                                            <ul class="portfolio-categories">
                                                <li>
                                                    <a href="#">Figma</a>
                                                </li>
                                                <li>
                                                    <a href="#">Webflow</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2><a href="#">Taskly Dashboard</a></h2>
                                    </div>
                                </div>

                                <div class="col-md-12 scroll-animation" data-animation="fade_from_bottom">
                                    <div class="portfolio-item portfolio-half">
                                        <div class="portfolio-item-inner">
                                            <a href="{{ asset('frontend/assets/images/portfolio4.jpg') }}"
                                                data-lightbox="example-1">
                                                <img src="{{ asset('frontend/assets/images/portfolio4.jpg') }}"
                                                    alt="Portfolio">
                                            </a>

                                            <ul class="portfolio-categories">
                                                <li>
                                                    <a href="#">Figma</a>
                                                </li>
                                                <li>
                                                    <a href="#">React</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2><a href="#">Hinterland - Real Estate Site Redesign</a></h2>
                                    </div>
                                </div>

                                <div class="col-md-12 scroll-animation" data-animation="fade_from_bottom">
                                    <div class="portfolio-item portfolio-half">
                                        <div class="portfolio-item-inner">
                                            <a href="{{ asset('frontend/assets/images/portfolio5.jpg') }}"
                                                data-lightbox="example-1">
                                                <img src="{{ asset('frontend/assets/images/portfolio5.jpg') }}"
                                                    alt="Portfolio">
                                            </a>

                                            <ul class="portfolio-categories">
                                                <li>
                                                    <a href="#">Framer</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2><a href="#">Lewis Portfolio Framer Template</a></h2>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </section>

                @if ($testimonials)
                    <section class="testimonial-area page-section scroll-to-page mb-5" id="testimonial">
                        <div class="custom-container">
                            <div class="testimonial-content content-width">
                                <div class="section-header">
                                    <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                        <i class="lar la-comment"></i> testimonial
                                    </h4>
                                    <h1 class="scroll-animation" data-animation="fade_from_bottom">Trusted by
                                        <span> Clients</span>
                                    </h1>
                                </div>

                                <div class="testimonial-slider-wrap scroll-animation"
                                    data-animation="fade_from_bottom">
                                    <div class="owl-carousel testimonial-slider owl-theme">


                                        @foreach ($testimonials as $testimonial)
                                            <div class="testimonial-item">
                                                <div class="testimonial-item-inner">
                                                    <div class="author d-flex align-items-center">
                                                        <img src="{{ asset('frontend/assets/images/testimonial-1.jpg') }}"
                                                            alt="testinomial">
                                                        <div class="right">
                                                            <h3>{{ $testimonial->name }}</h3>
                                                            <p class="designation">{{ $testimonial->designation }}
                                                                <span>{{ $testimonial->company_name }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <p>{!! $testimonial->description !!}</p>

                                                    <a target="_blank" href="{{ $testimonial->project_url }}"
                                                        class="project-btn">Project</a>
                                                </div>
                                            </div>
                                        @endforeach



                                    </div>
                                    <div class="testimonial-footer-nav">
                                        <div class="testimonial-nav d-flex align-items-center">
                                            <button class="prev"><i class="las la-angle-left"></i></button>
                                            <div id="testimonial-slide-count"></div>
                                            <button class="next"><i class="las la-angle-right"></i></button>
                                        </div>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </section>
                @endif


                {{-- <section class="pricing-area page-section scroll-to-page" id="pricing">
                    <div class="custom-container">
                        <div class="pricing-content content-width">
                            <div class="section-header">
                                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-dollar-sign"></i> pricing
                                </h4>
                                <h1 class="scroll-animation" data-animation="fade_from_bottom">My <span>Pricing</span>
                                </h1>
                            </div>

                            <div class="pricing-table-items">
                                <div class="row">


                                    <div class="col-md-6 scroll-animation" data-animation="fade_from_left">
                                        <div class="pricing-table">
                                            <div class="pricing-table-header">
                                                <div class="top d-flex justify-content-between align-items-start">
                                                    <h4>basic</h4>
                                                    <p class="text-right">Have design ready to build?<br>
                                                        or small budget</p>
                                                </div>
                                                <h1>$49 <span>/ hours</span></h1>
                                            </div>
                                            <ul class="feature-lists">
                                                <li>Need your wireframe</li>
                                                <li>Design with Figma, Framer</li>
                                                <li>Implement with Webflow, React, WordPress, Laravel/PHP</li>
                                                <li>Remote/Online</li>
                                                <li>Work in business days, no weekend.</li>
                                                <li>Support 6 months</li>
                                            </ul>
                                            <a href="#" class="theme-btn">pick this package</a>
                                        </div>
                                    </div>


                                    <div class="col-md-6 scroll-animation" data-animation="fade_from_right">
                                        <div class="pricing-table">
                                            <div class="pricing-table-header">
                                                <div class="top d-flex justify-content-between align-items-start">
                                                    <h4>premium</h4>
                                                    <p class="text-right">Not have any design?<br>
                                                        Leave its for me</p>
                                                </div>
                                                <h1>$99 <span>/ hours</span></h1>
                                            </div>
                                            <ul class="feature-lists">
                                                <li>Don't need wireframe or anything</li>
                                                <li>Design with Figma, Framer from scratch</li>
                                                <li>Implement with Webflow, React, WordPress, Laravel/PHP</li>
                                                <li>Remote/Online</li>
                                                <li>Work with both weekend</li>
                                                <li>Support 12 months</li>
                                                <li>Your project alway be priority</li>
                                                <li>Customer care gifts</li>
                                            </ul>
                                            <a href="#" class="theme-btn">pick this package</a>
                                        </div>
                                    </div>
                                </div>
                                <p class="info scroll-animation" data-animation="fade_from_bottom">
                                    Don't find any package match with your plan!<br>
                                    Want to setup a new tailor-made package for only you?. <a href="#">Contact
                                        Us</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </section> --}}


                <section class="contact-area page-section scroll-content" id="contact">
                    <div class="custom-container">
                        <div class="contact-content content-width">
                            <div class="section-header">
                                <h4 class="subtitle scroll-animation" data-animation="fade_from_bottom">
                                    <i class="las la-dollar-sign"></i> contact
                                </h4>
                                <h1 class="scroll-animation" data-animation="fade_from_bottom">Let's Work
                                    <span>Together!</span>
                                </h1>
                            </div>
                            <h3 class="scroll-animation" data-animation="fade_from_bottom">
                                {{ $site_settings->main_email ?? $site_settings->support_email }}</h3>
                            <p id="required-msg">* Marked fields are required to fill.</p>

                            <form class="contact-form " method="POST" action="{{ route('contact.send') }}">
                                @csrf
                                <div class="alert alert-success messenger-box-contact__msg" style="display: none"
                                    role="alert">
                                    Your message was sent successfully.
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <label for="full-name">Name <sup>*</sup></label>
                                            <input type="text" name="name" id="full-name"
                                                placeholder="Your Full Name">
                                            @error('name')
                                                <samp class="text-danger">{{ $message }}</samp>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <label for="email">Email <sup>*</sup></label>
                                            <input type="email" name="email" id="email"
                                                placeholder="Your email adress">
                                            @error('email')
                                                <samp class="text-danger">{{ $message }}</samp>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-group">
                                            <label for="subject">Subject <sup>*</sup></label>
                                            <input type="text" name="subject" id="subject"
                                                placeholder="Your subject ">
                                            @error('subject')
                                                <samp class="text-danger">{{ $message }}</samp>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <label for="message">message</label>
                                            <textarea name="message" id="message" placeholder="Wrire your message here ..."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-group submit-btn-wrap">
                                            <button class="theme-btn" name="submit" type="submit"
                                                id="submit-form">send message</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </main>
    @include('frontend.layouts.partial.footer.footer')


</body>

<!-- Mirrored from wpriverthemes.com/HTML/drake/home6.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 31 Aug 2024 04:52:43 GMT -->

</html>
