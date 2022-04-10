<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--style css-->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/new/assets/style.css') }}">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

    <!---fontawesome--->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/new/assets/all.css') }}">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>

    <!----google-fonts---->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
        rel="stylesheet">

    <!---owl-carousel---->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
    <!--java scripts-->
    <script src="{{ asset('frontend/new/js/myScript.js') }}"></script>
    <script src="{{ asset('frontend/new/js/moment.js') }}"></script>

    <link href="{{ asset('frontend/css/model.css') }}" rel="stylesheet" type="text/css" />
    @yield('styles')

</head>


<body>


    <!-- Modal -->
    <div class="modal fade" id="edit_payment" tabindex="-1" aria-labelledby="edit_paymentLabel" aria-hidden="true"
        style="z-index: 999999999;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_paymentLabel">تعديل معلومات الدفع</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="paymentModel" tabindex="-1" aria-labelledby="paymentModelLabel" aria-hidden="true"
        style="z-index: 99999999;">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModelLabel">معلومات الدفع</h5>
                    <button type="button"  style="margin-right:920px;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @php
        $setting = \App\Models\Setting::first();
        $services = \App\Models\Service::get();
        if (\Request::is('about*')) {
            $current_hero_section = 'hero-section hero-section-sub-pages about-hero-section';
        } elseif (\Request::is('service*')) {
            $current_hero_section = 'hero-section hero-section-sub-pages services-hero-section';
        } elseif (\Request::is('team*')) {
            $current_hero_section = 'hero-section hero-section-sub-pages consaltants-hero-section';
        } elseif (\Request::is('courses*')) {
            $current_hero_section = 'hero-section hero-section-sub-pages courses-hero-section';
        } elseif (\Request::is('contactus*')) {
            $current_hero_section = 'hero-section hero-section-sub-pages contact-hero-section';
        } elseif (\Request::is('blogs*')) {
            $current_hero_section = 'hero-section hero-section-sub-pages blog-hero-section';
        } elseif (\Request::is('course/*')) {
            $current_hero_section = 'hero-section hero-section-sub-pages courses-hero-section';
        } elseif (\Request::is('reservations*') || Request::is('account*') || Request::is('groups*') || Request::is('packages_user*')) {
            $current_hero_section = '';
        } else {
            $current_hero_section = 'hero-section';
        }

        if (\Request::is('user_login*') || \Request::is('signup*')) {
            $current_main_container = 'sign-front-bg';
        } else {
            $current_main_container = '';
        }
    @endphp
    <div class="main-container {{ $current_main_container }}">
        @if (\Request::is('user_login*') || \Request::is('signup*'))
            {{-- dont include header --}}
        @else
            <div class="{{ $current_hero_section }} container-fluid">
                <header>
                    <div class="header-inner row navbar navbar-default">
                        <div
                            class="col-8 header-menu  {{ request()->is('reservations*') || request()->is('groups*') ? '  book-date-header' : '' }}">
                            @auth
                                <div class="dropdown mobile-sign account-sign">
                                    <button class="btn btn-secondary dropdown-toggle shadow-none desktop-book-date-account"
                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="true" onclick="this.blur();">
                                        {{ Auth::user()->name }}
                                    </button>
                                    <button class="btn btn-secondary dropdown-toggle shadow-none mobile-book-date-account"
                                        type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                        aria-expanded="true" onclick="this.blur();">
                                        <i class="fas fa-user"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1"
                                        style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(407px, 38px, 0px);@if (Auth::user()->user_type == 'patient') height: 190px; @endif"
                                        data-popper-placement="bottom-start">
                                        <li><a class="dropdown-item" href="{{ route('frontend.account') }}">
                                                حسابي
                                            </a></li>
                                        @if (Auth::user()->user_type == 'patient')
                                            <li><a class="dropdown-item"
                                                    href="{{ route('frontend.reservations.index') }}">
                                                    الحجوزات السابقة
                                                </a></li>
                                            <li
                                                class="account-nav-menu-item {{ request()->is('packages_user*') ? '   active-nav-menu-item' : '' }}">
                                                <a class=""
                                                    href="{{ route('frontend.packages_user.index') }}">
                                                    الباقات
                                                </a>
                                            </li>
                                        @else
                                            <li><a class="dropdown-item" href="{{ route('frontend.groups.index') }}">
                                                    الدورات السابقة
                                                </a></li>
                                        @endif

                                        <li><a style="cursor: pointer" class="dropdown-item signout-item"
                                                onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                                تسجيل الخروج
                                            </a></li>
                                    </ul>
                                </div>
                            @endauth
                            <ul
                                class="desktop-menu  {{ request()->is('reservations*') ||request()->is('packages_user*') ||request()->is('account*') ||request()->is('groups*')? ' book-date-menu': '' }}">
                                <li><a class="menu-link {{ request()->is('/') ? ' active' : '' }}"
                                        href="{{ route('frontend.home') }}">الرئيسية</a></li>
                                <li><a class="menu-link {{ request()->is('packages') ? ' active' : '' }}"
                                        href="{{ route('frontend.packages') }}">باقتنا</a></li>
                                <li><a class="menu-link {{ request()->is('about') ? ' active' : '' }} "
                                        href="{{ route('frontend.about') }}">عن رشد</a></li>
                                <li><a class="menu-link {{ request()->is('services') ? ' active' : '' }}"
                                        href="{{ route('frontend.services') }}">خدماتنا</a></li>
                                <li><a class="menu-link {{ request()->is('team') ? ' active' : '' }} "
                                        href="{{ route('frontend.team') }}">مستشارين رشد</a></li>
                                <li><a class="menu-link {{ request()->is('courses') || request()->is('course/*') ? ' active' : '' }} "
                                        href="{{ route('frontend.courses') }}">الدورات التدريبية</a></li>
                                <li><a class="menu-link {{ request()->is('blogs') ? ' active' : '' }} "
                                        href="{{ route('frontend.blogs') }}">مدونة</a></li>
                                <li><a class="menu-link {{ request()->is('contactus') ? ' active' : '' }} "
                                        href="{{ route('frontend.contactus') }}">تواصل معنا</a></li>
                            </ul>
                            <a href="#toggle" class="hamburgler">
                                <div class="bun top"></div>
                                <div class="meat"></div>
                                <div class="bun bottom"></div>
                            </a>
                            <ul class="mobile-menu">
                                <li><a class="menu-link {{ request()->is('/') ? ' active' : '' }}"
                                        href="{{ route('frontend.home') }}">الرئيسية</a></li>
                                <li><a class="menu-link {{ request()->is('packages') ? ' active' : '' }}"
                                        href="{{ route('frontend.packages') }}">باقتنا</a></li>
                                <li><a class="menu-link {{ request()->is('about') ? ' active' : '' }} "
                                        href="{{ route('frontend.about') }}">عن رشد</a></li>
                                <li><a class="menu-link {{ request()->is('services') ? ' active' : '' }}"
                                        href="{{ route('frontend.services') }}">خدماتنا</a></li>
                                <li><a class="menu-link {{ request()->is('team') ? ' active' : '' }} "
                                        href="{{ route('frontend.team') }}">مستشارين رشد</a></li>
                                <li><a class="menu-link {{ request()->is('courses') ? ' active' : '' }} "
                                        href="{{ route('frontend.courses') }}">الدورات التدريبية</a></li>
                                <li><a class="menu-link {{ request()->is('blogs') ? ' active' : '' }} "
                                        href="{{ route('frontend.blogs') }}">مدونة</a></li>
                                <li><a class="menu-link {{ request()->is('contactus') ? ' active' : '' }} "
                                        href="{{ route('frontend.contactus') }}">تواصل معنا</a></li>
                            </ul>
                        </div>
                        <div class="col-4 logo-container">
                            @php
                                if ($setting->logo) {
                                    $image = $setting->logo->getUrl('preview');
                                    //$image = asset('frontend/img/logo.png');
                                } else {
                                    $image = asset('frontend/new/img/logo.png');
                                }
                            @endphp

                            <a href="{{ route('frontend.home') }}"><img class="logo"
                                    src="{{ $image }}"></a>
                        </div>
                    </div>
                </header>

                @if (isset($home))
                    <div class="hero-section-inner container row">
                        <div class="col-lg-5">
                            <p class="white">
                                <?php echo nl2br($setting->about_rosd); ?>
                            </p>

                            @auth
                                @if (auth()->user()->user_type == 'patient')
                                    <a class="btn book-date shadow-none"
                                        href="{{ route('frontend.reservations.create') }}">حجز موعد</a>
                                @else
                                    <a class="btn book-date shadow-none" href="{{ route('frontend.groups.create') }}">حجز
                                        موعد</a>
                                @endif
                            @else
                                <a class="btn book-date shadow-none" href="{{ route('frontend.login') }}">حجز موعد</a>
                            @endauth
                        </div>
                        <div class="col-lg-7"></div>

                    </div>
                @endif

            </div>
        @endif

        <!-- -->
        @yield('content')
        <!-- -->

        @if (\Request::is('user_login*') || \Request::is('signup*') || \Request::is('reservations*') || \Request::is('account*') || \Request::is('groups*'))
            {{-- dont include footer --}}
        @else
            <div class="footer container-fluid">
                <div class="footer-inner row container">
                    <div class="col-lg-4 text-center">
                        <a href="index.html"><img class="footer-logo" src="{{ $image }}"></a>
                        <p>جميع الحقوق محفوظة رشد للاستشارات النفسية 2021</p>
                        <p>تصميم وبرمجة <a href="https://alliance-sa.com/index_ar">تحالف الرؤى</a></p>
                    </div>
                    <div class="col-lg-2">
                        <h6 class="footer-title">خدمات رشد</h6>
                        <ul class="menu-footer">
                            @foreach ($services as $service)
                                <li><a
                                        href="{{ route('frontend.service', $service->id) }}">{{ $service->name }}</a>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    <div class="col-lg-2">
                        <h6 class="footer-title"><a href="{{ route('frontend.courses') }}"> الدورات التدريبية</a>
                        </h6>
                        <ul class="menu-footer">

                        </ul>
                    </div>
                    <div class="col-lg-4 footer-social-media">
                        <div class="footer-buttons">
                            <a href="{{ $setting->phone ?? '' }}"><i
                                    class="fab fa-whatsapp social-media-footer"></i></a>
                            <a href="{{ $setting->twitter ?? '' }}"><i
                                    class="fab fa-twitter social-media-footer"></i></a>
                            <a href="{{ $setting->facebook ?? '' }}"><i
                                    class="fab fa-facebook social-media-footer"></i></a>
                            <a href="{{ $setting->instagram ?? '' }}"><i
                                    class="fab fa-instagram social-media-footer"></i></a>
                        </div>
                        @auth
                            @if (auth()->user()->user_type == 'patient')
                                <a class="btn book-date shadow-none footer-btn"
                                    href="{{ route('frontend.reservations.create') }}">حجز موعد</a>
                            @endif
                        @else
                            <a class="btn book-date shadow-none footer-btn" href="{{ route('frontend.login') }}">حجز
                                موعد</a>
                        @endauth
                    </div>
                </div>

            </div>
        @endif

    </div>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    @include('sweetalert::alert')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    <script src="{{ asset('frontend/js/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.min.js') }}"></script>
    <script>
        $('.owl-one').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: true,
            dots: false,
            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1025: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        $('.owl-two').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: true,
            dots: false,
            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1025: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        $('.owl-three').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            autoplayTimeout: 3000,
            nav: false,
            dots: false,
            rtl: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1025: {
                    items: 4
                }
            }
        })
    </script>
    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        document.getElementById("defaultOpen").click();
    </script>
    <script>
        function change_payment_type(form_name, type) {
            if (type == 'cash') {
                $(form_name + ' .payment_type_cash_icon').css('color', 'violet');

                $(form_name + ' .payment_type_bank_icon').css('color', '#3c4b64');
                $(form_name + ' .payment_type_package_icon').css('color', '#3c4b64');

                $(form_name + ' .bank-info').css('display', 'none');
                $(form_name + ' .cash-info').css('display', 'block');
                $(form_name + ' .package-info').css('display', 'none');

                $(form_name + ' .payment_type_cash').prop('checked', true);
            } else if (type == 'bank') {
                $(form_name + ' .payment_type_bank_icon').css('color', 'violet');

                $(form_name + ' .payment_type_cash_icon').css('color', '#3c4b64');
                $(form_name + ' .payment_type_package_icon').css('color', '#3c4b64');

                $(form_name + ' .bank-info').css('display', 'block');
                $(form_name + ' .cash-info').css('display', 'block');
                $(form_name + ' .package-info').css('display', 'none');

                $(form_name + ' .payment_type_bank').prop('checked', true);
            } else if (type == 'package') {
                $(form_name + ' .payment_type_package_icon').css('color', 'violet');

                $(form_name + ' .payment_type_cash_icon').css('color', '#3c4b64');
                $(form_name + ' .payment_type_bank_icon').css('color', '#3c4b64');

                $(form_name + ' .package-info').css('display', 'block');
                $(form_name + ' .bank-info').css('display', 'none');
                $(form_name + ' .cash-info').css('display', 'none');

                $(form_name + ' .payment_type_package').prop('checked', true);
            }
        }

        function payment_model(model_id, model) {
            $.post('{{ route('frontend.payments.payment_model') }}', {
                _token: '{{ csrf_token() }}',
                model: model,
                model_id: model_id
            }, function(data) {
                $('#paymentModel').modal('show');
                $('#paymentModel .modal-body').html(null);
                $('#paymentModel .modal-body').html(data);
            })
        }

        function edit_payment(payment_id) {
            $.post('{{ route('frontend.payments.edit_partials') }}', {
                _token: '{{ csrf_token() }}',
                id: payment_id
            }, function(data) {
                $('#edit_payment').modal('show');
                $('#edit_payment .modal-body').html(null);
                $('#edit_payment .modal-body').html(data);
            })
        }
    </script>
    @yield('scripts')
</body>

</html>
