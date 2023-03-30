<!DOCTYPE html>
<html lang="en">

{{-- head --}}
@include('user.partials.head')

<body>
    <!-- Navbar  -->
        @include('user.partials.navbar')
    <!-- End Navbar -->

    <!-- Content -->
    <div class="container">
        <div class="container w-75 text-center mt-5">
            <p class="h6 fw-bold text-uppercase">Survei Kepuasan Masyarakat Terhadap Kinerja Biro Administrasi Pimpinan Sekretarian Daerah Provinsi Jawa Timur</p>
        </div>

        <div class="card w-75 mx-auto my-5">
           @yield('content')
        </div>
    </div>
    <!-- End Content -->

    <!-- Footer -->
        @include('user.partials.footer')
    <!-- End Footer -->

    @include('user.partials.script')
    @stack('scripts')
</body>

</html>
