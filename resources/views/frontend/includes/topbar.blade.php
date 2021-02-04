@php
    $Setting = App\model\admin\Setting::select('phone','email')->first();
@endphp

<div class="top_bar">
    <div class="container">
        <div class="row">
            <div class="col d-flex flex-row">
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public/frontend/images/phone.png') }}" alt=""></div>
                    @if ($Setting->phone)
                        {{ $Setting->phone }}
                    @else
                        +88 018 378 89646
                    @endif
                </div>
                <div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{ asset('public/frontend/images/mail.png') }}" alt=""></div>
                    @if ($Setting->email)
                        {{ $Setting->email }}
                    @else
                        mneshat7@gmail.com
                    @endif
                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <div class="top_bar_contact_item"><i class="fa fa-truck" aria-hidden="true"></i><a href="" data-toggle="modal" data-target="#exampleModal">  TRACK MY ORDER</a></div>
                <div class="top_bar_content ml-auto">
                    <div class="top_bar_menu">
                        <ul class="standard_dropdown top_bar_dropdown">
                            <li>
                                @if(Session::get('language') == 'bangla')
                                    <a href="{{ route('language.english') }}">English<i class="fas fa-chevron-down"></i></a>
                                @else
                                    <a href="{{ route('language.bangla') }}">Bangla<i class="fas fa-chevron-down"></i></a>
                                @endif
                            </li>
                            <li>
                                <a href="#">$ US dollar<i class="fas fa-chevron-down"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="top_bar_user">
                        @guest
                            <div><a href="{{ route('login') }}"><div class="user_icon"><img src="{{ asset('public/frontend/images/user.svg') }}" alt="user icon"></div> SIGNUP / LOGIN</a></div>
                        @else
                            <ul class="standard_dropdown top_bar_dropdown">
                                <li>
                                    <a href="{{ route('home') }}"><div class="user_icon"><img src="{{ asset('public/frontend/images/user.svg') }}" alt="user icon"></div> Profile<i class="fas fa-chevron-down"></i></a>
                                    <ul>
                                        <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                        <li><a href="{{ route('user.checkout') }}">CheckOut</a></li>
                                        <li><a href="{{ route('user.logout') }}">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>      
</div>

