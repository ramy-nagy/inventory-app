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

    @include('frontend.layouts.styles')
</head>
@php
app()->getLocale() == 'ar' ? ($dir = 'rtl') : ($dir = 'ltr');
@endphp

<body dir="{{ $dir ?? '' }}" class="border-top-wide border-primary d-flex flex-column ">
    <div class="page">
        @include('frontend.layouts.top-navbar')
        {{-- @include('frontend.layouts.navbar') --}}
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <!-- Page pre-title -->
                            <div class="page-pretitle">
                                {{ __('Overview') }}
                            </div>
                            <h2 class="page-title">
                                @yield('h1')
                            </h2>
                        </div>
                        <div class="col-12 col-md-auto ms-auto d-print-none">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary d-none d-sm-inline-block"
                                    data-bs-toggle="modal" data-bs-target="#modal-report">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    Create new project
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <main>
                {{ $slot }}
            </main>
            @include('frontend.layouts.footer')
        </div>
    </div>
    @include('frontend.layouts.scripts')
</body>

</html>
