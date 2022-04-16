@extends('layouts.app')

@section('content')
<div class="wrapper">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="">
                <h1 class="text-center">{{ __('Register') }}</h1>

                <div class="">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 form-field d-flex align-items-center">
                            

                            
                                <input placeholder="Enter name" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="row mb-3 form-field d-flex align-items-center">
                            

                            
                                <input placeholder="Enter email" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        
                            

                            <div class="row mb-3 form-field d-flex align-items-center">
                                <input placeholder="Enter password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        

                        
                            

                            <div class="row mb-3 form-field d-flex align-items-center">
                                <input placeholder="Retype password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            
                            </div>
                        </div>
                    </form>
                    <div class="d-flex justify-content-end mt-3">
                    <span style="margin-right: 10px">or</span> <a href="login">Login</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
