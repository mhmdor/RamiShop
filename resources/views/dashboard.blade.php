<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>المتجر </title>
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
        <a class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-shopping-bag me-3"></i>المتجر</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">

                <a href="{{ route('logout') }}" class="nav-item nav-link">تسجيل خروج</a>
            </div>
            {{-- <a  class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">10000  <i class="fa fa-book me-3"></i></a> --}}
        </div>
    </nav>
    <!-- Navbar End -->





    <!-- Service Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">

                @if (\Session::has('message'))
                    <div class="alert alert-success">
                        <ul>
                            <li>{!! \Session::get('message') !!}</li>
                        </ul>
                    </div>
                @endif
            </div>
            <div class="row g-4">

                <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('storage') }}">
                        <div class="service-item text-center pt-3">

                            <div class="p-4">
                                <i class="fa fa-3x fa-archive text-primary mb-4"></i>
                                <h5 class="mb-3">المخزن</h5>

                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('indexItem') }}">
                        <div class="service-item text-center pt-3">

                            <div class="p-4">
                                <i class="fa fa-3x fa-shopping-basket text-primary mb-4"></i>
                                <h5 class="mb-3">البيع</h5>

                            </div>
                        </div>
                    </a>
                </div>


                
                <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('getCarts') }}">
                        <div class="service-item text-center pt-3">

                            <div class="p-4">
                                <i class="fa fa-3x  fa-credit-card text-primary mb-4"></i>
                                <h5 class="mb-3">المبيعات</h5>

                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                    <a href="{{ route('indexNotRemove') }}">
                        <div class="service-item text-center pt-3">

                            <div class="p-4">
                                <i class="fa fa-3x  fa-eraser text-primary mb-4"></i>
                                <h5 class="mb-3">المرتجعات</h5>

                            </div>
                        </div>
                    </a>
                </div>

                @if (Auth::user()->is_admin)
                    <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('box') }}">
                            <div class="service-item text-center pt-3">

                                <div class="p-4">
                                    <i class="fa fa-3x fa-calculator text-primary mb-4"></i>
                                    <h5 class="mb-3">الصندوق</h5>

                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('distributor') }}">
                            <div class="service-item text-center pt-3">

                                <div class="p-4">
                                    <i class="fa fa-3x fa-user text-primary mb-4"></i>
                                    <h5 class="mb-3">الموزعين</h5>

                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('Client') }}">
                            <div class="service-item text-center pt-3">

                                <div class="p-4">
                                    <i class="fa fa-3x fa-male text-primary mb-4"></i>
                                    <h5 class="mb-3">العملاء</h5>

                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('getBuy') }}">
                            <div class="service-item text-center pt-3">

                                <div class="p-4">
                                    <i class="fa fa-3x  fa-truck text-primary mb-4"></i>
                                    <h5 class="mb-3">المشتريات</h5>

                                </div>
                            </div>
                        </a>
                    </div>

                    

                
                    


                    <div class="col-lg-4 col-6 wow fadeInUp" data-wow-delay="0.1s">
                        <a href="{{ route('statics') }}">
                            <div class="service-item text-center pt-3">

                                <div class="p-4">
                                    <i class="fa fa-3x fa-star text-primary mb-4"></i>
                                    <h5 class="mb-3">الأحصائيات</h5>

                                </div>
                            </div>
                        </a>
                    </div>
                @endif




















                {{-- <div class="modal fade" id="exampleModal23" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title" id="staticBackdropLabel">بحث عن طلب </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="{{ route('search.order') }}" method="POST">
                                @csrf

                                <div class="modal-body">
                                    <div class="wrap-input100 validate-input text-center">
                                        <span style="font-size: 23px ; color:rgb(34, 35, 50);font-weight:bold"
                                            class="label-input100">اختر العملية المطلوبة</span>
                                        <div style="height: 15px"></div>
                                        <div class="text-center">
                             <input id="id" type="number" class="input100 form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="phone" autofocus>
  
                                        </div>
                                        <span class="focus-input100"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button style="font-size: 20px" type="submit"
                                        class="btn btn-dark ">بحث</button>
                                </div>

                            </form>




                        </div>
                    </div>
                </div> 
               --}}




                {{-- <div class="modal fade" id="exampleModal24" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h5 class="modal-title" id="staticBackdropLabel">بحث عن طلب </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <form action="{{ route('search.order.Auto') }}" method="POST">
                                @csrf

                                <div class="modal-body">
                                    <div class="wrap-input100 validate-input text-center">
                                        <span style="font-size: 23px ; color:rgb(34, 35, 50);font-weight:bold"
                                            class="label-input100">اختر العملية المطلوبة</span>
                                        <div style="height: 15px"></div>
                                        <div class="text-center">
                             <input id="id" type="number" class="input100 form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="phone" autofocus>
  
                                        </div>
                                        <span class="focus-input100"></span>
                                    </div>
                                </div>
                                <div class="modal-footer">

                                    <button style="font-size: 20px" type="submit"
                                        class="btn btn-dark ">بحث</button>
                                </div>

                            </form>




                        </div>
                    </div>
                </div>  --}}





            </div>
        </div>
    </div>
    <!-- Service End -->





    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $("#myElem").show().delay(3000).fadeOut();
    </script>
</body>

</html>
