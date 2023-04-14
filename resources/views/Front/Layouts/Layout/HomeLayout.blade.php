@include('Front/Layouts/Parts/Links/Header')
<!-- Content-->
<div class="container">
    <div>
        <!-- NAVBAR -->
        @include('Front/Layouts/Parts/Content/Navbar')
        <!-- NAVBAR END-->
    </div>
    <div>
        @yield('HomeContent')
    </div>
</div>
<!-- /Content-->

@include('Front/Layouts/Parts/Links/Footer')