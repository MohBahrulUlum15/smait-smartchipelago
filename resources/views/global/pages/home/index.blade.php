@extends('global.layouts.app')

@push('styles')
@endpush

@section('content')
    {{-- Video Section --}}
    <section id="home" class="video-section js-height-full">
        <div class="overlay"></div>
        <div class="home-text-wrapper relative container">
            <div class="home-message">
                <p>SMA Islam Al Ghozali</p>
                <small>Motto, Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, excepturi.</small>
                <div class="btn-wrapper">
                    <div class="text-center">
                        <a href="#" class="btn btn-primary wow slideInLeft">Selengkapnya</a> &nbsp;&nbsp;&nbsp;
                    </div>
                </div><!-- end row -->
            </div>
        </div>
        <div class="slider-bottom">
            <span>Explore <i class="fa fa-angle-down"></i></span>
        </div>
    </section>

    {{-- Sambutan Kepala Sekolah --}}
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 hidden-sm hidden-xs">
                    <div class="custom-module">
                        <img src="{{ asset('global/assets/upload/device_01.png') }}" alt=""
                            class="img-responsive wow slideInLeft">
                    </div><!-- end module -->
                </div><!-- end col -->
                <div class="col-md-8">
                    <div class="custom-module p40l">
                        {{-- <h2>We are a passionate <mark>learning system</mark> from<br>
                            London. Do beautiful and easy-to-use digital <br>
                            design & web development</h2> --}}

                        <h2>Sambutan Kepala Sekolah</h2>

                        <p>Assalamualaikum Warahmatullahi Wabarakatuh. Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Eos quas dolorem exercitationem optio delectus odio, omnis iusto nisi. Voluptate quae fuga
                            quidem veritatis? Delectus quo repellendus dolor, facilis eos eligendi dicta eveniet recusandae
                            vel praesentium expedita ipsa quis assumenda voluptatem optio, animi unde consequuntur illum
                            deleniti laborum aliquam odit beatae?</p>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam alias, consequuntur inventore
                            nesciunt, recusandae molestias aliquam quaerat deserunt assumenda itaque ducimus aspernatur
                            dolor. Sapiente deserunt totam, pariatur optio aliquid reiciendis aut? Ipsam tenetur ratione
                            quis illo totam voluptates, ullam explicabo repudiandae architecto ad hic quibusdam sunt,
                            voluptas possimus doloremque? Fugit sapiente suscipit autem accusantium voluptatum tenetur
                            facilis maiores, blanditiis, quis non repellat optio aut assumenda voluptates quisquam amet sint
                            eligendi!</p>

                        <hr class="invis">

                        {{-- <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 first">
                                <ul class="check">
                                    <li>Custom Shortcodes</li>
                                    <li>Visual Page Builder</li>
                                    <li>Unlimited Shortcodes</li>
                                    <li>Responsive Theme</li>
                                    <li>Tons of Layouts</li>
                                </ul><!-- end check -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <ul class="check">
                                    <li>Font Awesome Icons</li>
                                    <li>Pre-Defined Colors</li>
                                    <li>AJAX Transitions</li>
                                    <li>High Quality Support</li>
                                    <li>Unlimited Options</li>
                                </ul><!-- end check -->
                            </div><!-- end col-lg-4 -->
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 last">
                                <ul class="check">
                                    <li>Shopping Layouts</li>
                                    <li>Pre-Defined Fonts</li>
                                    <li>Style Changers</li>
                                    <li>Footer Styles</li>
                                    <li>Header Styles</li>
                                </ul><!-- end check -->
                            </div><!-- end col-lg-4 -->
                        </div><!-- end row -->

                        <hr class="invis">

                        <div class="btn-wrapper">
                            <a href="#" class="btn btn-primary">Learn More About us</a>
                        </div> --}}

                    </div><!-- end module -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>

    {{-- Program Unggulan --}}
    <section class="section gb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Program Unggulan</h3>
                <p>Maecenas sit amet tristique turpis. Quisque porttitor eros quis leo pulvinar, at hendrerit sapien
                    iaculis. Donec consectetur accumsan arcu, sit amet fringilla ex ultricies.</p>
            </div><!-- end title -->

            <div id="owl-01" class="owl-carousel owl-theme owl-theme-01">
                <div class="caro-item">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/course_01.jpg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small>Program Unggulan</small>
                                <a href="#" title="">Nama Program</a>
                            </h4>
                            <p>Deskripsi singkat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam,
                                nesciunt.</p>
                        </div><!-- end details -->
                    </div><!-- end box -->
                </div><!-- end col -->

                <div class="caro-item">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/course_01.jpg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small>Javascript</small>
                                <a href="#" title="">Nama Program</a>
                            </h4>
                            <p>Deskripsi singkat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam,
                                nesciunt.</p>
                        </div><!-- end details -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="caro-item">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/course_01.jpg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small>Javascript</small>
                                <a href="#" title="">Nama Program</a>
                            </h4>
                            <p>Deskripsi singkat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam,
                                nesciunt.</p>
                        </div><!-- end details -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="caro-item">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/course_01.jpg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small>Javascript</small>
                                <a href="#" title="">Nama Program</a>
                            </h4>
                            <p>Deskripsi singkat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam,
                                nesciunt.</p>
                        </div><!-- end details -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="caro-item">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/course_01.jpg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small>Javascript</small>
                                <a href="#" title="">Nama Program</a>
                            </h4>
                            <p>Deskripsi singkat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam,
                                nesciunt.</p>
                        </div><!-- end details -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="caro-item">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/course_01.jpg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small>Javascript</small>
                                <a href="#" title="">Nama Program</a>
                            </h4>
                            <p>Deskripsi singkat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam,
                                nesciunt.</p>
                        </div><!-- end details -->
                    </div><!-- end box -->
                </div><!-- end col -->
                <div class="caro-item">
                    <div class="course-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/course_01.jpg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="#" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->
                        <div class="course-details">
                            <h4>
                                <small>Javascript</small>
                                <a href="#" title="">Nama Program</a>
                            </h4>
                            <p>Deskripsi singkat. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laboriosam,
                                nesciunt.</p>
                        </div><!-- end details -->
                    </div><!-- end box -->
                </div><!-- end col -->

            </div><!-- end row -->

            <hr class="invis">

            <div class="section-button text-center">
                <a href="#" class="btn btn-primary">Semua Program</a>
            </div>
        </div><!-- end container -->
    </section>

    {{-- Berita Terbaru --}}
    <section class="section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Berita Terbaru</h3>
                <p>Lihat berita terbaru tentang SMA Islam Al Ghozali. Lorem ipsum dolor sit amet consectetur adipisicing
                    elit. Quam, voluptatibus.</p>
            </div><!-- end title -->

            <div class="row">

                <div class="col-lg-4 col-md-12">
                    <div class="blog-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/blog_02.jpeg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->

                        <div class="blog-desc">
                            <h4><a href="blog-single.html">Judul Berita</a></h4>
                            <p>Deskripsi berita. Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit. Consequatur est
                                nisi velit neque labore fuga, inventore ipsam doloremque, ea ex excepturi nihil magnam
                                adipisci soluta obcaecati incidunt doloribus. Iure, possimus?</p>
                            <a href="#" class="readmore">Selengkapnya</a>
                        </div><!-- end blog-desc -->

                        <div class="post-meta">
                            <ul class="list-inline">
                                <li><a href="#">20 March 2017</a></li>
                                <li><a href="#">by Author</a></li>
                                <li><a href="#">11 Share</a></li>
                            </ul>
                        </div><!-- end post-meta -->
                    </div><!-- end blog -->
                </div><!-- end col -->
                <div class="col-lg-4 col-md-12">
                    <div class="blog-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/blog_02.jpeg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->

                        <div class="blog-desc">
                            <h4><a href="blog-single.html">Judul Berita</a></h4>
                            <p>Deskripsi berita. Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit. Consequatur est
                                nisi velit neque labore fuga, inventore ipsam doloremque, ea ex excepturi nihil magnam
                                adipisci soluta obcaecati incidunt doloribus. Iure, possimus?</p>
                            <a href="#" class="readmore">Selengkapnya</a>
                        </div><!-- end blog-desc -->

                        <div class="post-meta">
                            <ul class="list-inline">
                                <li><a href="#">20 March 2017</a></li>
                                <li><a href="#">by Author</a></li>
                                <li><a href="#">11 Share</a></li>
                            </ul>
                        </div><!-- end post-meta -->
                    </div><!-- end blog -->
                </div><!-- end col -->
                <div class="col-lg-4 col-md-12">
                    <div class="blog-box">
                        <div class="image-wrap entry">
                            <img src="{{ asset('global/assets/upload/blog_02.jpeg') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <a href="blog-single.html" title=""><i class="flaticon-add"></i></a>
                            </div>
                        </div><!-- end image-wrap -->

                        <div class="blog-desc">
                            <h4><a href="blog-single.html">Judul Berita</a></h4>
                            <p>Deskripsi berita. Lorem ipsum, dolor sit amet consectetur adipisicing
                                elit. Consequatur est
                                nisi velit neque labore fuga, inventore ipsam doloremque, ea ex excepturi nihil magnam
                                adipisci soluta obcaecati incidunt doloribus. Iure, possimus?</p>
                            <a href="#" class="readmore">Selengkapnya</a>
                        </div><!-- end blog-desc -->

                        <div class="post-meta">
                            <ul class="list-inline">
                                <li><a href="#">20 March 2017</a></li>
                                <li><a href="#">by Author</a></li>
                                <li><a href="#">11 Share</a></li>
                            </ul>
                        </div><!-- end post-meta -->
                    </div><!-- end blog -->
                </div><!-- end col -->

            </div><!-- end row -->

            <hr class="invis">

            <div class="section-button text-center">
                <a href="#" class="btn btn-primary">Semua Berita</a>
            </div>
        </div><!-- end container -->
    </section>

    {{-- Galeri --}}
    <section class="section gb">
        <div class="container">
            <div class="row">
                <div class="section-title text-center">
                    <h3>Galeri & Video</h3>
                    <p>Lihat semua galeri & video tentang SMA Islam Al Ghozali. Lorem ipsum dolor sit amet consectetur.</p>
                </div><!-- end title -->

                <div class="row blog-grid shop-grid">

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            {{-- <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="#" title="">Brown leather bag</a>
                                    <small>Bags</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$441.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer --> --}}
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="{{ asset('global/assets/upload/shop_01.jpg') }}" alt=""
                                    class="img-responsive">
                                <div class="magnifier">
                                    <a href="#" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>


                    {{-- <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_02.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Long coat jacket</a>
                                    <small>Jackets</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$122.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_03.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Style own glasses</a>
                                    <small>Glasses</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$52.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_04.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Printed white t-shirt</a>
                                    <small>T-Shirts</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$22.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_05.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Long white sweater</a>
                                    <small>Sweater</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$66.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_06.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Black men's shoes</a>
                                    <small>Shoes</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$578.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_07.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Night blue sapphire coat</a>
                                    <small>Coat</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$90.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_08.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Long leather jacket</a>
                                    <small>Shorts</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$22.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_09.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Stylish black bag</a>
                                    <small>Bags</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$412.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_10.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Skirt and blouse</a>
                                    <small>Skirt</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$331.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_11.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Motif Skirt and Blouse</a>
                                    <small>Blouse</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$44.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col -->

                    <div class="col-md-3">
                        <div class="course-box shop-wrapper">
                            <div class="image-wrap entry">
                                <img src="upload/shop_12.jpg" alt="" class="img-responsive">
                                <div class="magnifier">
                                    <a href="shop-single.html" title=""><i class="flaticon-add"></i></a>
                                </div>
                            </div>
                            <!-- end image-wrap -->
                            <div class="course-details shop-box text-center">
                                <h4>
                                    <a href="shop-single.html" title="">Feather collar coat</a>
                                    <small>Coats</small>
                                </h4>
                            </div>
                            <!-- end details -->
                            <div class="course-footer clearfix">
                                <div class="pull-left">
                                    <ul class="list-inline">
                                        <li><a href="#"><i class="fa fa-shopping-basket"></i> Add Cart</a></li>
                                    </ul>
                                </div><!-- end left -->

                                <div class="pull-right">
                                    <ul class="list-inline">
                                        <li><a href="#">$441.00</a></li>
                                    </ul>
                                </div><!-- end left -->
                            </div><!-- end footer -->
                        </div><!-- end box -->
                    </div><!-- end col --> --}}
                </div><!-- end row -->

                {{-- <hr class="invis"> --}}

                {{-- PAGINATION --}}
                {{-- <div class="row text-center">
                    <div class="col-md-12">
                        <ul class="pagination">
                            <li class="disabled"><a href="javascript:void(0)">&laquo;</a></li>
                            <li class="active"><a href="javascript:void(0)">1</a></li>
                            <li><a href="javascript:void(0)">2</a></li>
                            <li><a href="javascript:void(0)">3</a></li>
                            <li><a href="javascript:void(0)">...</a></li>
                            <li><a href="javascript:void(0)">&raquo;</a></li>
                        </ul>
                    </div><!-- end col -->
                </div><!-- end row --> --}}
            </div>
        </div><!-- end container -->
    </section>

    {{-- Pengajar --}}
    <section class="section">
        <div class="container">
            <div class="section-title text-center">
                <h3>Pengajar</h3>
                <p>Para pengajar SMA Islam Al Ghozali. Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis, quod.
                </p>
            </div><!-- end title -->
            <div class="row text-center">

                <div class="col-md-3 col-sm-6">
                    <div class="teammembers">
                        <div class="entry">
                            <img src="{{ asset('global/assets/upload/01_team.png') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <div class="visible-buttons1 teambuttons">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                    <div class="social-links">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                                    </div><!-- end social -->
                                </div>
                            </div>
                        </div><!-- end box -->
                        <div class="teamdesc">
                            <h4>Nama Pengajar</h4>
                            <p>Jabatan / Posisi Pengajar</p>
                        </div><!-- end teamdesc -->
                    </div><!-- end teammembers -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-6">
                    <div class="teammembers">
                        <div class="entry">
                            <img src="{{ asset('global/assets/upload/01_team.png') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <div class="visible-buttons1 teambuttons">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                    <div class="social-links">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                                    </div><!-- end social -->
                                </div>
                            </div>
                        </div><!-- end box -->
                        <div class="teamdesc">
                            <h4>Nama Pengajar</h4>
                            <p>Jabatan / Posisi Pengajar</p>
                        </div><!-- end teamdesc -->
                    </div><!-- end teammembers -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-6">
                    <div class="teammembers">
                        <div class="entry">
                            <img src="{{ asset('global/assets/upload/01_team.png') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <div class="visible-buttons1 teambuttons">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                    <div class="social-links">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                                    </div><!-- end social -->
                                </div>
                            </div>
                        </div><!-- end box -->
                        <div class="teamdesc">
                            <h4>Nama Pengajar</h4>
                            <p>Jabatan / Posisi Pengajar</p>
                        </div><!-- end teamdesc -->
                    </div><!-- end teammembers -->
                </div><!-- end col -->

                <div class="col-md-3 col-sm-6">
                    <div class="teammembers">
                        <div class="entry">
                            <img src="{{ asset('global/assets/upload/01_team.png') }}" alt=""
                                class="img-responsive">
                            <div class="magnifier">
                                <div class="visible-buttons1 teambuttons">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
                                    <div class="social-links">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                        <a href="#"><i class="fa fa-whatsapp"></i></a>
                                    </div><!-- end social -->
                                </div>
                            </div>
                        </div><!-- end box -->
                        <div class="teamdesc">
                            <h4>Nama Pengajar</h4>
                            <p>Jabatan / Posisi Pengajar</p>
                        </div><!-- end teamdesc -->
                    </div><!-- end teammembers -->
                </div><!-- end col -->

            </div><!-- end row -->
            <hr class="invis">

            <div class="section-button text-center">
                <a href="#" class="btn btn-primary">Semua Pengajar</a>
            </div>
        </div><!-- end container -->
    </section>
@endsection

@push('scripts')
    <!-- VIDEO BG PLUGINS -->
    <script src="{{ asset('global/assets/js/videobg.js') }}"></script>

    <script>
        jQuery(document).ready(function($) {
            var Video_back = new video_background($("#home"), {
                "position": "absolute", //Follow page scroll
                "z-index": "-1", //Behind everything
                "loop": true, //Loop when it reaches the end
                "autoplay": true, //Autoplay at start
                "muted": true, //Muted at start
                "mp4": "{{ asset('global/assets/upload/preview.mp4') }}", //Path to video mp4 format
                "ogg": "{{ asset('global/assets/upload/preview.ogg') }}", //Path to video ogg format
                "webm": "{{ asset('global/assets/upload/preview.webm') }}", //Path to video webm format
                "video_ratio": 1.7778, // width/height -> If none provided sizing of the video is set to adjust
                "fallback_image": "{{ asset('global/assets/images/prettyPhoto/default/default_thumb.png') }}", //Fallback image path
                "priority": "html5" //Priority for html5 (if set to flash and tested locally will give a flash security error)
            });
        });
    </script>
@endpush
