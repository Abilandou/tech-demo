<footer class="footer-area bg-grey">
    <!-- Footer-top Start -->
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer-top-inner pt--50 pb--100">
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <!-- Footer-info Start -->
                                <div class="footer-info mt--60">
                                    <div class="footer-logo">
                                        <a href="#"><img src="{{asset('public/assets/images/logo/logo.png')}}" alt=""></a>
                                    </div>
                                    <p class="text-justify">
                                        At TECH-REPUBLIC we are geared at meeting the needs of people in the areas of 
                                        computer software, Networking and Hardware. Satisfaction of our customers 
                                        is our priority.
                                    </p>
                                    <ul class="social">
                                        <li><a href="#"><i class="bi bi-facebook"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter-bird"></i></a></li>
                                        <li><a href="#"><i class="bi bi-twitter"></i></a></li>
                                        <li><a href="#"><i class="bi bi-youtube"></i></a></li>
                                    </ul>
                                </div><!--// Footer-info End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Footer-info Start -->
                                <div class="footer-info mt--60">
                                    <div class="footer-title">
                                        <h3>SERVICES</h3>
                                    </div>
                                    <ul class="footer-list">
                                        @foreach(\App\Service::orderBy('id', 'DESC')->take(4)->get() as $service)
                                            <li><a href="{{ route('single.service',['url'=>$service->url]) }}">{!! $service->name !!}</a></li>
                                        @endforeach
                                        
                                    </ul>
                                </div><!--// Footer-info End -->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!-- Footer-info Start -->
                                <div class="footer-info mt--60">
                                    <div class="footer-title">
                                        <h3>QUICK CONTACT</h3>
                                    </div>
                                    <ul class="footer-list">
                                        <li>Cameroon, Southwest Region, Buea , <br>Beside Presbyterian church Molyko</li>
                                        <li><a href="#">info@techrepublic.tech</a></li>
                                        <li><a href="#">support@techrepublic.tech</a></li>
                                        <li><a href="#">(+237)678-981-340</a></li>
                                        <li><a href="#">(+237) 650-534-961</a></li>
                                    </ul>
                                </div><!--// Footer-info End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--// Footer-top End -->
    
    <!-- footer-bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center text-black footer-bottom-inner">
                        <p>Copyright &copy; Tech-Republic <?php echo(date('Y'))?> All Right Reserved</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!--// footer-bottom End -->

</footer>