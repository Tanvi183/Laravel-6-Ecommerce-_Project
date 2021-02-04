<!DOCTYPE html>
<html lang="en">
<head>
    <title>OneTech</title>
    <meta name="csrf" value="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link -->
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/responsive.css') }}">
    {{-- <link rel="stylesheet" type="text/css" href="{{ asset('/public/frontend/styles/product_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/public/frontend/styles/product_responsive.css') }}"> --}}
    <!---- Ajax ----->
    <script src="{{ asset('public/frontend/plugins/ajax/jquery.min.js') }}"></script>
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- alerts CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <!-- sweetalert2 -->
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://js.stripe.com/v3/"></script>
    @stack('css')
</head>

<body>

    <div class="super_container">
        
        <!-- Header -->
	
        <header class="header">

            <!-- Top Bar -->
    
            @include('frontend.includes.topbar')
    
            <!-- Header Main -->
    
            @include('frontend.includes.main_header');
            
            <!-- Main Navigation -->
    
                @yield('category_menu')
            
            <!-- Menu -->
            @include('frontend.includes.menu')
    
        </header>

        <!--- Content Area --->

            @yield('content')
            
        <!-- Newsletter -->
       
            @include('frontend.includes.newsletter');

        <!-- Footer -->

            @include('frontend.includes.footer')

    </div>

    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Track My Order</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('tracking.order.index') }}" method="POST">
          @csrf
          <div class="modal-body">
            {{-- <label for="username">Please confirm your email : </label><br>
            <input type="text" class="form-control" name="email"> --}}
            <label for="username">Your order Code : </label><br>
            <input type="text" class="form-control" name="status_code">
          </div>
            <button type="submit" class="btn btn-primary" style="margin: 0px 0 10px 10px;">Track Now</button>
        </form>
      </div>
    </div>
</div><!-- End Model --->

    <!--- Js Link ---->
    
    <script src="{{ asset('/public/frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('public/frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('public/frontend/js/custom.js') }}"></script>
    {{-- <script src="{{ asset('public/frontend/js/product_custom.js') }}"></script> --}}
    <!--- Notify js Start --->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    @stack('js')

    <!---- START: Toaster --->
    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
    </script> 
    
    <!---- START: Sweetalert ---->
    <script>  
        $(document).on("click", "#delete", function(e){
            e.preventDefault();
            var link = $(this).attr("href");
               swal({
                 title: "Are you Want to delete?",
                 text: "Once Delete, This will be Permanently Delete!",
                 icon: "warning",
                 buttons: true,
                 dangerMode: true,
               })
               .then((willDelete) => {
                 if (willDelete) {
                      window.location.href = link;
                 } else {
                   swal("Safe Data!");
                 }
               });
           });
   </script>

</body>
</html>