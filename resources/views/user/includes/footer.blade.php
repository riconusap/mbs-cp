<div class="container-fluid bg-secondary text-white mt-5 pt-5 px-sm-3 px-md-5">
    <div class="row pt-5">
        <div class="col-lg-4 col-md-12 mb-5">
            <a href="index.html" class="navbar-brand">
                <img src="{{ asset('img/' . $tp->logo_perusahaan) }}" width="100px" alt="">
            </a>
            <p>COMMITTED TO EXCELLENCE</p>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
            <h5 class="font-weight-bold text-primary mb-4">Quick Links</h5>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-white mb-2" href="{{ route('dashboard-user') }}"><i
                        class="fa fa-angle-right text-primary mr-2"></i>Home</a>
                <a href="{{ route('data-attorney') }}" class="text-white mb-2 "><i
                        class="fa fa-angle-right text-primary mr-2"></i>Our Attorney</a>
                <a href="{{ route('data-artikel-user') }}" class="text-white mb-2"><i
                        class="fa fa-angle-right text-primary mr-2"></i>Articles</a>
                <a href="contact.html" class="text-white mb-2"><i
                        class="fa fa-angle-right text-primary mr-2"></i>Contact Us</a>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 mb-5">
            <h5 class="font-weight-bold text-primary mb-4">Get In Touch</h5>
            <p><i class="fa fa-map-marker-alt text-primary mr-2"></i>{{ $tp->alamat_perusahaan }}</p>
            <p><i class="fa fa-phone-alt text-primary mr-2"></i>{{ $tp->no_telp_perusahaan }}</p>
            <p><i class="fa fa-envelope text-primary mr-2"></i>{{ $tp->email_perusahaan }}</p>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5">
    <p class="m-0 text-center">
        &copy; <a class="font-weight-semi-bold" href="#">Company Names</a>. Designed by @riconusap
    </p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary back-to-top"><i class="fa fa-angle-up"></i></a>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"
    integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('user/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('user/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ asset('user/lib/counterup/counterup.min.js') }}"></script>
<script src="{{ asset('user/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.17/dist/sweetalert2.all.min.js"></script>
<script>
    AOS.init();
</script>

<!-- Contact Javascript File -->
<script src="{{ asset('user/mail/jqBootstrapValidation.min.js') }}"></script>
<script src="{{ asset('user/mail/contact.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('user/js/main.js') }}"></script>
