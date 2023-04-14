
        <!-- FOOTER START -->
        <section class="footer bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <?php
                         $site_setting = getSiteSetting();
                            ?>
                        <div class="footer-menu">
                            <h5 class="mb-4 text-uppercase">Larix</h5>
                            <p>The Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium eaque quae ab illo inventore veritatis et.</p>
                            <div class="text-white">
                                <a href="{{$site_setting->facebook_link}}" target="_blank" ><i class="fa fa-facebook"></i></a>
                                <a href="{{$site_setting->twitter_link}}" target="_blank" ><i class="fa fa-twitter"></i></a>
                                <a href="{{$site_setting->instagram_link}}" target="_blank" ><i class="fa fa-instagram"></i></a>
                                <a href="{{$site_setting->google_link}}" target="_blank" ><i class="fa fa-google"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer-menu">
                            <h5 class="mb-4 text-uppercase">About</h5>
                            <ul class="text-muted list-unstyled">
                                <li><a href="{{route('data.cms',"aboutus")}}">About Us</a></li>
                                <li><a href="{{route('data.cms',"faq")}}">Faq's</a></li>
                                <li><a href="#">Press</a></li>
                                <li><a href="#">Job Opening</a></li>
                                <li><a href="{{route('data.cms',"termscondition")}}">Term & Condition</a></li>
                                <li><a href="{{route('data.cms',"privacy-policy")}}">Privacy Policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-2">
                        <div class="footer-menu">
                            <h5 class="mb-4 text-uppercase">Help Center</h5>
                            <ul class="text-muted list-unstyled">
                                <li><a href="#">Accounting</a></li>
                                <li><a href="#">Billing</a></li>
                                <li><a href="#">General Question</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="footer-menu">
                            <h5 class="mb-4 text-uppercase">Contact us</h5>
                            <p>The Nam eget dui Etiam rhoncus. Maecenas eget sem quam semper libero.</p>
                            <span class="footer-support">Support@abc.com</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-5">
                            <p class="mb-0">2020  © Larix.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- FOOTER END -->

				<!-- JAVASCRIPTS -->
				
				<!-- SCROLL -->
				<script src="{{URL::asset('assets/js/scrollspy.min.js')}}"></script>
				<!-- bootstrap -->
				<script src="{{URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>
				<!-- easing -->
				<script src="{{URL::asset('assets/js/jquery.easing.min.js')}}"></script>
				<!-- Portfolio -->
				<script src="{{URL::asset('assets/js/jquery.magnific-popup.min.js')}}"></script>
				<script src="{{URL::asset('assets/js/isotope.js')}}"></script>
				<!-- scroll -->
				<script src="{{asset('assets/js/scrollspy.min.js')}}"></script>
				<!-- Owl Carousel -->
				<script src="{{URL::asset('assets/js/owl.carousel.min.js')}}"></script>
				<!-- Custom -->
				<script src="{{URL::asset('assets/js/app.js')}}"></script>
                <script src="{{URL::asset('assets/js/plugin.js')}}"></script>
                <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <script>
        CKEDITOR.replace( 'editor1', {
            extraPlugins: 'imageuploader'
        });
        CKEDITOR.editorConfig = function( config ) {
            config.extraPlugins = 'imageuploader';
        };
    </script>