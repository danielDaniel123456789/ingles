@extends('layouts.app')


@section('content')


<div class="container">
    <div class="d-flex justify-content-center text-center animate__animated animate__bounce">
        <div class="">
            <div class="card bg-dark text-white" >
                <div class="card-header animate__animated animate__bounce text-warning">
                    <h3>REGISTER</h3>
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 animate__animated animate__bounce">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" 
                                required autocomplete="name" autofocus
                                placeholder="Name"
                                >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 animate__animated animate__bounce">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') 
                                is-invalid @enderror" name="email" value="{{ old('email') }}" 
                                required autocomplete="email"
                                placeholder="Email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 animate__animated animate__bounce">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password')
                                 is-invalid @enderror" name="password" 
                                 required autocomplete="new-password"
                                 placeholder="Password">


                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 animate__animated animate__bounce">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" 
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm Password">

                            </div>
                        </div>

                        <div class=" mb-0 animate__animated animate__bounce">
                            <div class="">
                                <button type="submit" class="btn btn-warning">
                                    REGISTER
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center ">

    <img style=" opacity: 0.1 !important; " src="https://static.preply.com/static/ssr/_next/static/images/choose_tutor-ce5a3d44c76764b9a533e8a8dadc2a57.svg" alt="">
  
</div>

@endsection
