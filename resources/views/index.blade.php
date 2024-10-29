@extends('layouts.master')

@section('content')

    <div class="wrap-login100">
        <div class="login100-form-title" style="background-image: url(/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
        </div>

        <form class="login100-form validate-form" method="POST" action="http://127.0.0.1:8000/api/login">
            @csrf

            <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                <span class="label-input100">Your Email</span>
                <input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                <span class="label-input100">Password</span>
                <input class="input100" type="password" name="password" required autocomplete="current-password" placeholder="Enter password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                @enderror
                <span class="focus-input100"></span>
            </div>

            <div class="flex-sb-m w-full p-b-30">
                <div class="contact100-form-checkbox">
                    <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                    <label class="label-checkbox100" for="ckb1">
                        Remember me
                    </label>
                </div>
                <div>



                    <a href="http://127.0.0.1:8000/registerauth" class="txt1">
                        Register
                    </a>

                </div>
            </div>

            <div class="container-login100-form-btn">
                <button class="login100-form-btn"  type="submit">
                    Login
                </button>


            </div>
        </form>
    </div>
@endsection
