@php
app()->getLocale() == 'ar' ? ($rtl = '.rtl') : ($rtl = '');
@endphp
<!-- Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
@if (app()->getLocale() == 'ar')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/cust-fonts.css') }}" />
@endif
<link rel="stylesheet" type="text/css" href="{{ asset('css/toastr.min.css') }}">

<!-- Styles -->
{{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
<!-- CSS files -->
<link rel="stylesheet" type="text/css" href="{{ asset("frontend/css/tabler$rtl.min.css") }}" />
{{-- <link rel="stylesheet" type="text/css" href="{{ asset("frontend/css/tabler-flags.min.css") }}" /> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset("frontend/css/tabler-payments.min.css") }}" /> --}}
{{-- <link rel="stylesheet" type="text/css" href="{{ asset("frontend/css/tabler-vendors.min.css") }}" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset("frontend/css/demo$rtl.min.css") }}" />

@livewireStyles
@stack('styels')