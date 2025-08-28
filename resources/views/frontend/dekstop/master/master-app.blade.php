<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.dekstop.master.master-meta')
    @include('frontend.dekstop.master.master-microdata')
    @include('frontend.dekstop.master.master-css')
</head>

<body>
    <div class="wrapper">
        @include('frontend.dekstop.components.navbar')
        <div class="main-content">
            @yield('content')
        </div>
        @include('frontend.dekstop.components.floating-ads')

        @include('frontend.dekstop.components.footer')
    </div>


    @include('frontend.dekstop.master.master-js')
</body>

</html>
