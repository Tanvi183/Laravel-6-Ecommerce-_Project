@extends('frontend.master')
@section('main-content')
    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-8 card">
                    <table class="table table-response">
                        <thead class="thead-dark">
                          <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                          </tr>
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