<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="widget clearfix">
                    <div style="width: 50px; height: 50px; margin-bottom: 20px;">
                        <img src="{{ asset('assets/images/logo-fix.png') }}" alt=""
                            style="width: 100%; height: 100%;">
                    </div>
                    <div class="widget-title">
                        <h3>SMAIT Al-Ghozali Jember</h3>
                    </div>
                    <p>{{ $mottoInFooter->deskripsi ?? 'Motto Sekolah' }}</p>
                    <div class="footer-right">
                        <ul class="footer-links-soi">
                            <li><a href="{{ $dataFooter->facebook_link_info ?? '#' }}" target="blank"><i
                                        class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $dataFooter->instagram_link_info ?? '#' }}" target="blank"><i
                                        class="fa fa-instagram"></i></a></li>
                            <li><a href="{{ $dataFooter->youtube_link_info ?? '#' }}" target="blank"><i
                                        class="fa fa-youtube-play"></i></a>
                            </li>
                        </ul><!-- end links -->
                    </div>
                </div><!-- end clearfix -->
            </div><!-- end col -->

            <div class="col-lg-6 col-md-6 col-xs-12">
                <div class="widget clearfix">
                    <div class="widget-title">
                        <h3>Contact Details</h3>
                    </div>

                    <ul class="footer-links">
                        {{-- <li><a href="mailto:#">smai.alghozalijbr@gmail.com</a></li>
                        <li><a href="#">smait.smartchipelago.com</a></li>
                        <li>Jl. Kaliurang No. 175, Sumbersari, Jember</li>
                        <li>+62 8213 9537 299</li> --}}
                        <li><a
                                href="mailto:{{ $dataFooter->email_info ?? 'email@info' }}">{{ $dataFooter->email_info ?? 'email@info' }}</a>
                        </li>
                        <li><a
                                href="{{ $dataFooter->website_link_info ?? '#' }}">{{ $dataFooter->website_name_info ?? 'SMAIT Al-Ghozali' }}</a>
                        </li>
                        <li>{{ $dataFooter->address_info ?? 'Address Info' }}</li>
                        <li>{{ $dataFooter->phone_info ?? 'Phone Info' }}</li>
                    </ul><!-- end links -->
                </div><!-- end clearfix -->
            </div><!-- end col -->

        </div><!-- end row -->
    </div><!-- end container -->
</footer><!-- end footer -->
