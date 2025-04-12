<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site_settings->website_name ?? '' }} - Portfolio</title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.png">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&amp;display=swap"
        rel="stylesheet">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/line-awesome.min.css') }}">
    <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/smooth-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css') }}">


    <style>
        /* .my_skills-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            max-width: 100%;
        }

        .my_skill {
            display: flex;
            border: 1px solid #ddd;
            border-radius: 5px;
            gap: 20px;
        }

        .my_skill-logo {
            width: 50px;
            height: 50px;
            object-fit: contain;
        }

        .my_skill-text {
            flex-grow: 1;
            padding-left: 55px;
        }

        .my_skill-percentage {
            min-width: 60px;
        } */

        .my_skills-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            padding: 10px;
            max-width: 100%;
        }

        .my_skill {
            display: flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            gap: 20px;
            padding: 10px;
        }

        .my_skill-text {
            flex-grow: 1;
            padding-left: 10px;
        }

        .my_skill-percentage {
            min-width: 60px;
        }

        .progress-bar {
            width: 60%;
            background-color: #f3f3f3;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
            height: 20px;
            margin-left: 20px;
        }

        .progress-fill {
            background-color: #28e98c;
            /* Progress bar color */
            height: 100%;
            width: 0;
            /* Initial width; to be set dynamically */
            transition: width 0.5s;
            /* Smooth transition for progress */
        }
    </style>
</head>
