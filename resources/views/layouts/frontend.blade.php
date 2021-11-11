<!DOCTYPE HTML>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="" type="image/x-icon">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> رشد للاستشارات والتدريب </title>


    <link rel="stylesheet" href="https://unpkg.com/@popperjs/core@2">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/js/bootstrap.js') }}">
    <link rel="stylesheet" href="{{ asset('frontend/fonts/stylesheet.css') }}">
    <script src="https://kit.fontawesome.com/e0387e9a75.js"></script>
    <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">




    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">



    <script src="js/main.js"></script>

    <link rel="stylesheet" href="{{ asset('frontend/fonts/stylesheet.css') }}" type="text/css" charset="utf-8" />
    <link href="{{ asset('frontend/css/model.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!----------brandslider---------------->
    <!----slider---->
    <script src="http://code.jquery.com/jquery.js"></script>

    <script src="{{ asset('frontend/src/skdslider.min.js') }}"></script>
    <link href="{{ asset('frontend/src/skdslider.css') }}" rel="stylesheet">
    <script type="text/javascript">
        jQuery(document).ready(function() {
            jQuery('#demo1').skdslider({
                'delay': 5000,
                'animationSpeed': 2000,
                'showNextPrev': true,
                'showPlayButton': true,
                'autoSlide': true,
                'animationType': 'sliding'
            });
            jQuery('#demo2').skdslider({
                'delay': 5000,
                'animationSpeed': 1000,
                'showNextPrev': true,
                'showPlayButton': true,
                'autoSlide': true,
                'animationType': 'sliding'
            });
            jQuery('#demo3').skdslider({
                'delay': 5000,
                'animationSpeed': 2000,
                'showNextPrev': true,
                'showPlayButton': true,
                'autoSlide': true,
                'animationType': 'fading'
            });

            jQuery('#responsive').change(function() {
                $('#responsive_wrapper').width(jQuery(this).val());
            });

        });
    </script>

    <!----slider---->

    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="{{ asset('frontend/js/jquery.flexisel.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('frontend/style/app.css') }}">

    @yield('styles')

</head>

<body>
    @php
        $setting = \App\Models\Setting::first();
    @endphp
    <div class="upper-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="contact-head">
                        <a href="tel:{{ $setting->phone ?? ''}}"> <i class="fas fa-phone" aria-hidden="true"></i> <span>{{ $setting->phone ?? ''}}</span>
                        </a>

                        <a href="mailto:saif.jader.ku.@gmail.com"> <i class="far fa-envelope" aria-hidden="true"></i>
                            <span>{{ $setting->email ?? ''}}</span></a>


                    </div>
                </div>

                <div class="col-md-5">
                    @auth 
                        <?php
                            if(auth()->user()->user_type == 'staff'){
                                $type = 'admin';
                            }elseif(auth()->user()->user_type == 'patient'){
                                $type = 'patient';
                            }elseif(auth()->user()->user_type == 'doctor'){
                                $type = 'doctor';
                            }elseif(auth()->user()->user_type == 'student'){
                                $type = 'student';
                            }else{
                                $type = 'admin';
                            }
                        ?>
                        <div class="login"><a href="{{ route($type.'.home') }}"><i class="fas fa-user"></i> {{ Auth::user()->name }} </a></div>
                    @else 
                        <div class="login"><a data-popup-open="popup-1" href="#"><i class="fas fa-user"></i> تسجيل
                                الدخول </a></div>
                    @endauth
                </div>

            </div>
        </div>

    </div>
    <!--------------header-------------->
    <div class="nav-toggle">
        <div class="nav-toggle-bar"></div>
    </div>


    <nav id="nav" class="nav">
        <ul>
            <li><a href="{{ route('frontend.home') }}">الرئيسية</a></li>
            <li><a href="{{ route('frontend.about') }}">عن رشد</a></li>
            <li><a href="{{ route('frontend.services') }}">خدماتنا</a></li>
            <li><a href="{{ route('frontend.team') }}">مستشارين رشد</a></li>
            <li><a href="{{ route('frontend.activties') }}">نشاطتنا </a></li>
            <li><a href="{{ route('frontend.courses') }}"> الدورات التدريبية</a></li>
            <li><a href="{{ route('frontend.consulting') }}">استشارات رشد </a></li>
            <li><a href="{{ route('frontend.contactus') }}">تواصل معنا </a></li>

        </ul>
    </nav>
    <!--==================================================================== 
        Start Hero Section
    =====================================================================-->


    @php
        if($setting->logo){
            //$image = $setting->logo->getUrl('preview');
            $image = asset('frontend/img/logo.png');
        }else{
            $image = asset('frontend/img/logo.png');
        }
    @endphp


    <section class="hero-section">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="logo">
                        <a href="{{ route('frontend.home') }}">
                            <img src="{{ $image }}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="logo-mobile "><img src="{{ $image }}" class="img-fluid"></div>
            </div>
        </div>
    </div>

    <!--==================================================================== 
        End Hero Section
    =====================================================================-->




    @yield('content')


    <!--  .adv -->
    <div class="home_adv ">
        <div class="container ">
            <div class="row ">


                <div class="col-md-7">
                    <h4>احجز استشارتك الان</h4> 
                    @auth 
                        @if(auth()->user()->user_type == 'patient')
                            <a  href="{{ route('patient.reservations.create') }}" class="btn-primary"><i class="fas fa-plus"
                                aria-hidden="true"></i> اضغط هنا لتحديد موعد </a> 
                        @endif
                    @else 
                        <a data-popup-open="popup-1" href="#" class="btn-primary"><i class="fas fa-plus"
                                aria-hidden="true"></i> اضغط هنا لتحديد موعد </a> 
                    @endauth
                </div>

                <div class="col-md-5">
                    <div class="pic">
                        <img src="{{ asset('frontend/img/booking-img.png') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="clear"> </div>

    <div class="copyrights">
        <div class="container">

            <div class="row">
                <div class="col-md-12 ">جميع الحقوق محفوظة رشد للاستشارات النفسية 2021 </div>
                <br />
                <div class="col-md-12">
                    <div class="social">
                        <ul>
                            <li> <a href="{{ $setting->twitter ?? ''}}"><i class="fab fa-twitter" aria-hidden="true"></i></a> </li>
                            <li> <a href="{{ $setting->facebook ?? ''}}"><i class="fab fa-facebook-f"></i></a> </li>


                            <li> <a href="{{ $setting->instagram ?? ''}}"> <i class="fab fa-instagram" aria-hidden="true"></i></a> </li>
                            <li> <a href="{{ $setting->you_tube ?? ''}}"><i class="fab fa-youtube" aria-hidden="true"></i></a> </li>
                        </ul>
                    </div>
                </div>
                <br /><br /><br />
                <div class="col-md-12 "> <a href="https://alliance-sa.com/index_ar" target="_blank"> تصميم وبرمجة
                        تحالف الرؤى </a> </div>

            </div>
        </div>
    </div>






    <script>
        $(function() {
            //----- OPEN
            $('[data-popup-open]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-open');
                $('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

                e.preventDefault();
            });

            //----- CLOSE
            $('[data-popup-close]').on('click', function(e) {
                var targeted_popup_class = jQuery(this).attr('data-popup-close');
                $('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

                e.preventDefault();
            });
        });
    </script>


    <div class="popup" data-popup="popup-1">
        <div class="popup-inner">
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>تسجيل الدخول</h1>
                    <div class="form-group">
                        <input type="text" name="email" placeholder="البريد الالكتروني أو رقم الهاتف" required value="{{ old('email', null) }}" autofocus>
                        @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="كلمة المرور" required>
                    </div>
                    <button class="login-btn">تسجيل الدخول</button>
                    <a class="reset-psw" href="#">نسيت كلمة المرور</a><a class="reset-psw"
                        href="{{ route('frontend.signup') }}"> مستخدم جديد </a>
                    <div class="seperator"><b>او</b></div>
                    <!-- Social login buttons -->

                </form>
            </div>

            <a class="popup-close" data-popup-close="popup-1" href="#">x</a>

        </div>

    </div>



    @include('sweetalert::alert')

    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <!----slider---->
    <script>
        (function(i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function() {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-3415878-12', 'dandywebsolution.com');
        ga('send', 'pageview');
    </script>
    <!----slider---->




    <script type="text/javascript">
        $(window).load(function() {
            $("#flexiselDemo1").flexisel();
            $("#flexiselDemo2").flexisel({
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

            $("#flexiselDemo3").flexisel({
                visibleItems: 4,
                animationSpeed: 1000,
                autoPlay: true,
                autoPlaySpeed: 3000,
                pauseOnHover: true,
                enableResponsiveBreakpoints: true,
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1
                    },
                    landscape: {
                        changePoint: 640,
                        visibleItems: 2
                    },
                    tablet: {
                        changePoint: 768,
                        visibleItems: 3
                    }
                }
            });

            $("#flexiselDemo4").flexisel({
                clone: false
            });

        });
    </script>

    <script src="{{ asset('frontend/script/nav.js') }}"></script>


    @yield('scripts')

</body>

</html>
