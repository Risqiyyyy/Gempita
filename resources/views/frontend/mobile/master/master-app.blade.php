<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.mobile.master.master-meta')
    @include('frontend.dekstop.master.master-microdata')
    @include('frontend.mobile.master.master-css')
</head>

<body>
    <div class="wrapper">
        @include('frontend.mobile.components.ads-2')
        @include('frontend.dekstop.master.master-microdata')
        @include('frontend.mobile.components.navbar')
        <div class="main-content mt-110 mb-20">
            @yield('content')
        </div>
        @include('frontend.mobile.components.footer')
    </div>


    @include('frontend.mobile.master.master-js')
</body>

</html>
