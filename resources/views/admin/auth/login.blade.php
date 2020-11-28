@extends('admin.admin_layouts')

@section('admin_content')
        
     <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

      <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse">Project <span class="tx-info tx-normal">admin</span></div>
        <div class="tx-center mg-b-60">Ecommerce Project</div>

        <form action="{{route('admin.login')}}" class="d-block" method="post">
            @csrf
            <!-- form-group -->
            <div class="form-group">
              <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address" >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- form-group -->
            <div class="form-group">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password" >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              <a href="{{ route('admin.password.request') }}" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
            </div>
            <button type="submit" class="btn btn-info btn-block">Sign In</button>
        </form>
      </div><!-- login-wrapper -->
    </div><!-- d-flex -->
@endsection
