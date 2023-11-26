<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Statics</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>


    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->



    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">

        <div class="collapse navbar-collapse" id="navbarCollapse">

            <a href="{{ route('home') }}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">الرئيسية<i
                    class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->





    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5"> اكثر المنتجات شراء </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">

                @foreach ($max_product as $item)
                    <div class="col-lg-3 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                        @php $prodID= Crypt::encrypt($item->id); @endphp

                        <a>
                            <div class="team-item bg-light">


                                <div class="text-center p-4">
                                    <h5 class="mb-0"> {{ $item->name }} </h5>
                                    <br>
                                    <h4>{{ $item->count }}</h4>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">اقل المنتجات شراء</h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">

                @foreach ($min_product as $item)
                    <div class="col-lg-3 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                        @php $prodID= Crypt::encrypt($item->id); @endphp

                        <a>
                            <div class="team-item bg-light">


                                <div class="text-center p-4">
                                    <h5 class="mb-0"> {{ $item->name }} </h5>
                                    <br>
                                    <h4>{{ $item->count }}</h4>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5"> قريب الانتهاء </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">

                @foreach ($near_finish as $item)
                    <div class="col-lg-3 col-md-3 wow fadeInUp" data-wow-delay="0.1s">
                        @php $prodID= Crypt::encrypt($item->id); @endphp

                        <a>
                            <div class="team-item bg-light">


                                <div class="text-center p-4">
                                    <h5 class="mb-0"> {{ $item->name }} </h5>
                                    <br>
                                    <h4>{{ $item->count }}</h4>

                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>







    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">  مجموع المبيعات </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">




                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @php $prodID= Crypt::encrypt($item->id); @endphp

                    <a>
                        <div class="team-item bg-light">


                            <div class="text-center p-4">
                                <h2 class="mb-0"> {{ $number_of_sell }} </h2>
                                <br>
                                <h4></h4>

                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">  مجموع المشتريات </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">




                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @php $prodID= Crypt::encrypt($item->id); @endphp

                    <a>
                        <div class="team-item bg-light">


                            <div class="text-center p-4">
                                <h2 class="mb-0"> {{ $number_of_buy }} </h2>
                                <br>
                                <h4></h4>

                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5"> مجموع المرتجعات </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">




                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @php $prodID= Crypt::encrypt($item->id); @endphp

                    <a>
                        <div class="team-item bg-light">


                            <div class="text-center p-4">
                                <h2 class="mb-0"> {{ $number_of_returned }} </h2>
                                <br>
                                <h4></h4>

                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <!-- Team End -->



    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">  اجمالي الربح </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">




                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @php $prodID= Crypt::encrypt($item->id); @endphp

                    <a>
                        <div class="team-item bg-light">


                            <div class="text-center p-4">
                                <h2 class="mb-0"> {{ $gain }} </h2>
                                <br>
                                <h4></h4>

                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <!-- Team End -->




    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">  الربح الصافي </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">




                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @php $prodID= Crypt::encrypt($item->id); @endphp

                    <a>
                        <div class="team-item bg-light">


                            <div class="text-center p-4">
                                <h2 class="mb-0"> {{ $gain2 }} </h2>
                                <br>
                                <h4></h4>

                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                
                <h1 class="mb-5">  الخسائر </h1>
            </div>
            @if (\Session::has('message'))
                <div id="myElem" class="alert alert-success text-center">
                    <ul>
                        <li>{!! \Session::get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row g-4">




                <div class="col-lg-12 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    @php $prodID= Crypt::encrypt($item->id); @endphp

                    <a>
                        <div class="team-item bg-light">


                            <div class="text-center p-4">
                                <h2 class="mb-0"> {{ $loss }} </h2>
                                <br>
                                <h4></h4>

                            </div>
                        </div>
                    </a>
                </div>



            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">

            </div>
        </div>

    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $("#myElem").show().delay(12000).fadeOut();
    </script>
</body>

</html>
