<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Order</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <meta http-equiv="refresh" content="20">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.bootstrap5.min.css">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
        <a  class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h2 class="m-0 text-primary"><i class="fa fa-book me-3"></i>Orders</h2>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            {{-- <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="index.html" class="nav-item nav-link">Home</a>
                <a href="about.html" class="nav-item nav-link active">About</a>
                <a href="courses.html" class="nav-item nav-link">Courses</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                    <div class="dropdown-menu fade-down m-0">
                        <a href="team.html" class="dropdown-item">Our Team</a>
                        <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                        <a href="404.html" class="dropdown-item">404 Page</a>
                    </div>
                </div>
                <a href="contact.html" class="nav-item nav-link">Contact</a>
            </div> --}}
            <a href="{{'dashboard'}}" class="btn btn-primary py-4 px-lg-5 d-none d-lg-block">Dashboard<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->
 

    <!-- Header Start -->
    <div class="container-fluid bg-primary py-1 mb-5 page-header">
        <div class="container py-1">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 style="font-size: 50px" class="display-3 text-white animated slideInDown">كل الطلبات</h1>
                    
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
<div style="margin-left:130px; width: 80%;"   class="card-content table-responsive justify-content-center text-center">
    <table class="table table-bordered" id="example" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>رقم المنتح</th>
                <th>الأسم</th>
                <th>سعر الجملة</th>
                <th>سعر المفرق</th>
                <th>الكمية</th>
                <th>العملية</th>
               
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($orders as $item)

           
            
            <tr>
                <td>{{$item->id}}</td>
                @if ($item->description =='وحدات')
                <td>{{$item->companyCom->name}}</td> 
                @elseif ($item->description =='الهاتف الارضي')
                <td>Telephone</td> 
                @else
                <td>{{$item->company->name}}</td> 
                @endif
               
                <td>{{$item->user->person_name}}</td>
                <td>{{$item->phone_number}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->total_price}}</td>
                <td>{{ $item->previous }}</td>
                <td>{{ $item->current }}</td>
                <td>{{ $item->created_at }}</td>
                   @if ($item->description =='وحدات')
                 @if ($item->companyCom->name == 'Syriatel')
                <td>فاتورة</td> 
                @elseif ($item->companyCom->name == 'Syriatel_K')
                <td>كازية</td> 
                @elseif ($item->companyCom->name == 'Syriatel_Cash')
                <td>كاش</td> 
                @elseif ($item->companyCom->name == 'Mtn')
                <td>فاتورة</td> 
                @elseif ($item->companyCom->name == 'Mtn_K')
                <td>كازية</td> 
                @elseif ($item->companyCom->name == 'Mtn_Cash')
                <td>كاش</td> 
              @elseif ($item->companyCom->name == 'Mtn_KF')
                <td>جملة فاتورة</td> 
                 @endif
               @elseif ($item->description=='باقات')
                @if ($item->price == '1000' || $item->price == '650' )
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">5G</span>  باقة</td>   
                @elseif ($item->price == '1800' || $item->price == '1200')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">10G</span>  باقة</td>
                @elseif ($item->price == '3100' || $item->price == '2000')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">20G</span>  باقة</td>
                @elseif ($item->price == '4100' || $item->price == '2700')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">30G</span>  باقة</td>
                @elseif ($item->price == '6100' || $item->price == '3950')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">50G</span>  باقة</td>
                @elseif ($item->price == '7600' || $item->price == '4950')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">75G</span>  باقة</td>
                @elseif ($item->price == '10400' || $item->price == '6800')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">100G</span>  باقة</td>
                @elseif ($item->price == '19000' || $item->price == '12400')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">200G</span>  باقة</td>   
              @elseif ($item->price == '1000' || $item->price == '780' )
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">5G</span>  باقة</td>   
                @elseif ($item->price == '1800' || $item->price == '1350')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">10G</span>  باقة</td>
                @elseif ($item->price == '3100' || $item->price == '2350')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">20G</span>  باقة</td>
                @elseif ($item->price == '4100' || $item->price == '3150')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">30G</span>  باقة</td>
                @elseif ($item->price == '6100' || $item->price == '4650')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">50G</span>  باقة</td>
                @elseif ($item->price == '7600' || $item->price == '5850')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">75G</span>  باقة</td>
                @elseif ($item->price == '10400' || $item->price == '8000')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">100G</span>  باقة</td>
                @elseif ($item->price == '19000' || $item->price == '14600')
                <td><span style="color: rgb(214, 45, 39);font-weight:bold">200G</span>  باقة</td>  
               @else 
                <td>باقات</td>  
                    
                @endif 
                @else
                <td>{{$item->description}}</td>
                @endif
                
                <td>
                    <form method="POST" action="{{route('accept.order',['id'=>$item->id])}}">
                        @csrf
                     <button type="submit"  class="btn btn-success"> قبول  </button>  
                    </form>

                    <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}n">
                        رفض الطلب
                      </button>
                      
                      <!-- Modal -->
                      <div class="modal fade" id="staticBackdrop{{$item->id}}n" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="staticBackdropLabel"></h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form method="POST" action="{{route('reject.order')}}">
                                @csrf
                               
                            
                                <input type="text" name="id" value="{{$item->id}}" hidden>

                            <div class="modal-body">
                                <div class="wrap-input100 validate-input" data-validate="reason is required">
                                    <span class="label-input100">سبب الرفض</span>
                                              <input id="reason" type="text" class="input100 form-control @error('reason') is-invalid @enderror" name="reason" required autocomplete="new-reason">
                          
                                                          @error('reason')
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $message }}</strong>
                                                              </span>
                                                          @enderror
                                    <span class="focus-input100"></span>
                                  </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                              <button type="submit"  class="btn btn-danger"> رفض  </button>
                            </div>
                           </form>   
                          </div>
                        </div>
                      </div>
                    
                </td>
          
          
            </tr>
            @endforeach --}}
            
         
        </tbody>
        
     </table> 
 
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
    <script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
</script>
<script>
    $("#myElem").show().delay(3000).fadeOut();
  </script>
</body>

</html>