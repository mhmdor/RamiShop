<!DOCTYPE html>
<html lang="en">

<head>
    <title>add</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsform/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('/assetsform/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assetsform/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assetsform/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assetsform/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assetsform/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assetsform/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/assetsform/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/assetsform/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>


    <div class="container-contact100">
        <div class="wrap-contact100">

            <form method="POST" action="{{ route('addDebtClient') }}" class="contact100-form validate-form">
                @csrf
                <span class="contact100-form-title">
                    إضافة دين لعميل
                </span>


                <div class="wrap-input100 validate-input" data-validate="name is required">
                    <span class="label-input100">العميل</span>
                    <select class="form-control" name="client_id" id="client_id">
                        <option value=""></option>
                        @foreach ($all as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}
                            </option>
                        @endforeach

                    </select>



                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="amount is required">
                    <span class="label-input100">الدين</span>
                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                        name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                    @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span class="focus-input100"></span>
                </div>







                <div class="container-contact100-form-btn">
                    <div class="wrap-contact100-form-btn">
                        <div class="contact100-form-bgbtn"></div>
                        <button type="submit" class="contact100-form-btn">
                            <span>
                                إضافة
                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                            </span>
                        </button>

                    </div>
                </div>


            </form>
        </div>
    </div>



    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('/assetsform/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/assetsform/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/assetsform/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('/assetsform/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/assetsform/vendor/select2/select2.min.js') }}"></script>
    <script>
        $(".selection-2").select2({
            minimumResultsForSearch: 20,
            dropdownParent: $('#dropDownSelect1')
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('/assetsform/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('/assetsform/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/assetsform/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('/assetsform/js/main.js') }}"></script>


    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-23581568-13');
    </script>

</body>

</html>
