<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Box</title>
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">

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


    <!-- Header Start -->
    <div class="container-fluid bg-primary py-1 mb-5 page-header">
        <div class="container py-1">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 style="font-size: 50px" class="display-3 text-white animated slideInDown">الصندوق</h1>
                    <h1 style="font-size: 50px" class="display-3 text-white animated slideInDown">{{ $box->amount }}
                    </h1>

                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
    @if (\Session::has('message'))
        <div id="myElem" class="alert alert-success text-center">
            <ul>
                <li>{!! \Session::get('message') !!}</li>
            </ul>
        </div>
    @endif
    @if (\Session::has('error'))
        <div id="myElem" class="alert alert-danger text-center">
            <ul>
                <li>{!! \Session::get('error') !!}</li>
            </ul>
        </div>
    @endif

    <div class="card-content table-responsive justify-content-center text-center">
        <button style="width : 300px; height: 100px ;border-radius: 25px" type="button" class="btn btn-success"
            data-bs-toggle="modal" data-bs-target="#staticBackdropn">
            اضافة للصندوق
        </button>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdropn" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('updateBox') }}">
                        @csrf


                        {{-- <input type="text" name="cart_id" value="{{ $cart->id }}" hidden> --}}
                        <input type="text" name="is_add" value="1" hidden>

                        <div class="modal-body">
                            <div class="wrap-input100 validate-input" data-validate="amount is required">
                                <span class="label-input100">المبلغ</span>
                                <input id="amount" type="number"
                                    class="input100 form-control @error('amount') is-invalid @enderror" name="amount"
                                    required autocomplete="new-amount">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-success"> اضافة للصندوق </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>


        <button style="width : 300px; height: 100px ;border-radius: 25px" type="button" class="btn btn-danger"
            data-bs-toggle="modal" data-bs-target="#staticBackdropn1">
            خصم من الصندوق
        </button>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdropn1" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form method="POST" action="{{ route('updateBox') }}">
                        @csrf


                        {{-- <input type="text" name="cart_id" value="{{ $cart->id }}" hidden>
                    <input type="text" name="item_id" value="{{ $item->id }}" hidden> --}}

                        <input type="text" name="is_add" value="0" hidden>

                        <div class="modal-body">
                            <div class="wrap-input100 validate-input" data-validate="amount is required">
                                <span class="label-input100">المبلغ</span>
                                <input id="amount" type="number"
                                    class="input100 form-control @error('amount') is-invalid @enderror" name="amount"
                                    required autocomplete="new-amount">

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="focus-input100"></span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                            <button type="submit" class="btn btn-danger"> خصم من الصندوق </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>



    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.colVis.min.js"></script>
    <script src="{{ asset('assets/lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('assets/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('assets/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/lib/owlcarousel/owl.carousel.min.js') }}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#example_wrapper .col-md-6:eq(0)');
        });
    </script>
    <script>
        $("#myElem").show().delay(3000).fadeOut();
    </script>
</body>

</html>
