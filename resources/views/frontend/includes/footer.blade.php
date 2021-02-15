@php
    $Setting = App\model\admin\Setting::first();
@endphp

<footer class="footer">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 footer_col">
                <div class="footer_column footer_contact">
                    <div class="logo_container">
                        <div class="logo"><a href="{{ route('index') }}">
                            @if(isset($Setting->logo)) {{ $Setting->logo }}
                            @elseif(isset($Setting->shop_name)) {{ $Setting->shop_name }}
                            @else
                                @if (Session::get('language') == 'bangla')
                                    ওয়ানটেক
                                @else
                                    OneTech
                                @endif
                            @endif
                        </a>
                        </div>
                    </div>
                    <div class="footer_title">Got Question? Call Us 24/7</div>
                    <div class="footer_phone">
                        @if (isset($Setting->phone))
                            {{ $Setting->phone }}
                        @else
                            +88 018 378 89646
                        @endif
                    </div>
                    <div class="footer_contact_text">
                        @if(isset($Setting->address)) {{ $Setting->address }}
                        @else
                            <p>17 Princess Road, London</p>
                            <p>Grester London NW18JR, UK</p>
                        @endif
                    </div>
                    <div class="footer_social">
                        <ul>
                            <li><a href="@if(isset($Setting->facebook_url)){{ $Setting->facebook_url }}
                                        @else # @endif"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="@if(isset($Setting->twitter_url)){{ $Setting->twitter_url }}
                                        @else # @endif"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="@if(isset($Setting->youtube_url)){{ $Setting->youtube_url }}
                                        @else # @endif"><i class="fab fa-youtube"></i></a></li>
                            <li><a href="@if(isset($Setting->google_url)){{ $Setting->google_url }}
                                        @else # @endif"><i class="fab fa-google"></i></a></li>
                            <li><a href="@if(isset($Setting->vimeo_url)){{ $Setting->vimeo_url }}
                                        @else # @endif"><i class="fab fa-vimeo-v"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-2 offset-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Find it Fast</div>
                    @foreach ($categories as $key => $row)
                        <ul class="footer_list">
                            <li><a href="{{ url('/products/category/'.$row->id.'/'.$row->category_name) }}">{{ $row->category_name }}</a></li>
                        </ul>  
                    @endforeach
                </div>
            </div>

            <div class="col-lg-2">
                {{-- <div class="footer_column">
                    <ul class="footer_list footer_list_2">
                        <li><a href="#">Video Games & Consoles</a></li>
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Cameras & Photos</a></li>
                        <li><a href="#">Hardware</a></li>
                        <li><a href="#">Computers & Laptops</a></li>
                    </ul>
                </div> --}}
            </div>

            <div class="col-lg-2">
                <div class="footer_column">
                    <div class="footer_title">Customer Care</div>
                    <ul class="footer_list">
                        <li><a href="{{ route('login') }}">My Account</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#exampleModal">Order Tracking</a></li>
                        <li><a href="{{ route('cart.product.list') }}">Cart List</a></li>
                        <li><a href="#">Customer Services</a></li>
                        <li><a href="#">Returns / Exchange</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Product Support</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>

<!-- Copyright -->

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                    <div class="copyright_content" style="margin: 0 auto;text-align: center;">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with 
                        <i class="fa fa-heart" aria-hidden="true"></i> by 
                        @if (isset($Setting->copyright)){{ $Setting->copyright }} @else @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>