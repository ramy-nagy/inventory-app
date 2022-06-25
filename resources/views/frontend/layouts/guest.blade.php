<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="dashboard">
    <meta name="author" content="Ramy Nagy">
    <title>{{ config('app.name', '') }} - @yield('title')</title>

    @php
        app()->getLocale() == 'ar' ? ($rtl = '.rtl') : ($rtl = '');
        app()->getLocale() == 'ar' ? ($dir = 'rtl') : ($dir = 'ltr');
    @endphp
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/cust-fonts.css') }}" />
    <!-- Styles -->
    <!-- CSS files -->
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/css/tabler$rtl.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset("admin/css/demo$rtl.min.css") }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">
</head>

<body dir="{{ $dir ?? '' }}" class="border-top-wide border-primary d-flex flex-column ">
    <div class="page page-center">
        {{ $slot }}
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/js/tabler.min.js') }}" defer></script>
    <script src="{{ asset('admin/js/demo.min.js') }}" defer></script>
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            var type = "{{ Session::get('type') }}";
            var message = "{{ Session::get('message') }}";
            toastr[type](message);
        </script>
    @endif
    @if (Session::has('status'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            var status = "{{ Session::get('status') }}";
            toastr.info(status);
        </script>
    @endif
</body>

</html>
