@extends('frontend.app')
@section('content')
@php
    $orders = App\model\Frontend\Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
@endphp
    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-8 card">
                  <table class="table table-response">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Payment</th>
                        <th scope="col">Payment ID</th>
                        <th scope="col">Total</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status Code</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($orders as $item)
                        <tr>
                          <th>{{ $item->payment_type }}</th>
                          <td>{{ $item->payment_id }}</td>
                          <td>{{ $item->total }}</td>
                          <td>{{ $item->date }}</td>
                          <td>{{ $item->status_code }}</td>
                          <td><a href="" class="btn btn-sm btn-warning"><i class="fa fa-eye" title="View"></i></a></td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="col-4">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="public/frontend/img/img11.jpg" alt="Profile_img" style="height: 100px; width: 100px; border-radius: 50%; margin: 0 auto; margin-top: 10px; margin-bottom: 15px;">
                        <div class="card-body text-center">{{ Auth::user()->name  }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                          <li class="list-group-item text-center"><a href="#">Add Profile</a></li>
                          <li class="list-group-item text-center"><a href="{{ route('password.change') }}">Change Password</a></li>
                          <li class="list-group-item text-center"><a href="#">Profile Settings</a></li>
                        </ul>
                        <div class="card-body">
                          <a href="{{ route('user.logout') }}" class="btn btn-danger btn-block">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection