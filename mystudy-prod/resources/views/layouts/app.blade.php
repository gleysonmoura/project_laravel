<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
        <link rel="icon" type="image/png" href="/img/favicon.png">
        <title>
            {{ config('app.name') }}
        </title>
        <!--     Fonts and icons     -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link rel="stylesheet" href="{{asset ('./assets/css/nucleo-icons.css')}}">
        <link href="{{ asset ('./assets/css/nucleo-svg.css') }}" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
        <script src="{{asset ('assets/js/chartjs.min.js') }}"></script>
        <script src="{{asset ('assets/js/datatables.js') }}"></script>
        <script src="{{asset ('assets/js/quill.min.js') }}"></script>
        {{-- <script src="{{ asset ('assets/js/argon-dashboard.js') }}"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
        <!-- CSS Files -->

    </head>
    <link id="pagestyle" href="{{ asset ('assets/css/argon-dashboard.css') }}" rel="stylesheet" />

    <body class="g-sidenav-show vsc-initialized dark-version bg-gray-600">

        @guest

        @yield('content')
        @endguest
        {{--
        @include('layouts.navbars.auth.sidenav')
        <main class="main-content border-radius-lg">

            @yield('content')

            @include('layouts.footers.auth.footer')
        </main> --}}

        @auth
        @if (in_array(request()->route()->getName(), ['sign-in-static', 'sign-up-static', 'login', 'register',
        'recover-password']))
        @yield('content')
        @else
        @if (!in_array(request()->route()->getName(), ['profile', 'profile-static']))
        {{-- <div class="min-height-300 bg-primary position-absolute w-100"></div> --}}
        @elseif (in_array(request()->route()->getName(), ['profile-static', 'profile']))
        {{-- <div class="position-absolute w-100 min-height-300 top-0"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
            <span class="mask bg-primary opacity-6"></span>
        </div> --}}
        @endif
        @include('layouts.navbars.auth.sidenav')

        <main class="main-content border-radius-lg">
            @yield('content')
            @include('layouts.footers.auth.footer')
        </main>
        {{-- @include('components.fixed-plugin') --}}
        @endif
        @endauth

        <!--   Core JS Files   -->
        <script src="{{asset ('assets/js/core/popper.min.js') }}"></script>
        <script src="{{asset ('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{asset ('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{asset ('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>

        <script>
            var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset ('assets/js/argon-dashboard.min.js') }}"></script>
        @stack('js')
    </body>

</html>