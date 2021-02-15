@php
    $Setting = App\model\admin\Setting::select('phone1', 'email')->first();
@endphp

<div class="page_menu">
    <div class="container">
        <div class="row">
            <div class="col">
                
                <div class="page_menu_content">
                    
                    <div class="page_menu_search">
                        <form action="#">
                            <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                        </form>
                    </div>
                    <ul class="page_menu_nav">
                        <li class="page_menu_item has-children">
                            <a href="">Language<i class="fa fa-angle-down"></i></a>
                            <ul class="page_menu_selection">
                                @if(Session::get('language') == 'bangla')
                                    <li><a href="{{ route('language.english') }}">English<i class="fa fa-angle-down"></i></a></li>
                                @else
                                    <li><a href="{{ route('language.bangla') }}">Bangla<i class="fa fa-angle-down"></i></a></li>
                                @endif
                            </ul>
                        </li>
                        <li class="page_menu_item">
                            <a href="{{ route('index') }}">Home<i class="fa fa-angle-down"></i></a>
                        </li>
                        <li class="page_menu_item"><a href="{{ route('product.shop') }}">Shop Page<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item"><a href="{{ route('all.blog.show') }}">blog<i class="fa fa-angle-down"></i></a></li>
                        <li class="page_menu_item"><a href="{{ route('user.contact') }}">contact<i class="fa fa-angle-down"></i></a></li>
                    </ul>
                    
                    <div class="menu_contact">
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('/public/frontend/images/phone_white.png') }}" alt=""></div>
                            @if (isset($Setting->phone1))
                                {{ $Setting->phone1 }}
                            @else
                                +88 018 378 89646
                            @endif
                        </div>
                        <div class="menu_contact_item"><div class="menu_contact_icon"><img src="{{ asset('/public/frontend/images/mail_white.png') }}" alt=""></div>
                            <a href="mneshat7@gmail.com">
                                @if (isset($Setting->email))
                                    {{ $Setting->email }}
                                @else
                                    mneshat7@gmail.com
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>