<!doctype html>
<html lang="en">

<head>
    @include('backend.master.master-meta')
    @include('backend.master.master-css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="page-sidebar-closed-hide-logo page-content-white page-container-bg-solid">
    <div id="app">
        @include('backend.components.topbar')
        <div class="d-block d-lg-flex">
            @include('backend.components.sidebar')
            <div class="page-wrapper">
                @include('sweetalert::alert')
                    @yield('content')
                @include('backend.components.footer')
            </div>
        </div>
    </div>
    @extends('backend.master.master-js')
</body>
</html>
