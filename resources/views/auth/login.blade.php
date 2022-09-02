@extends('layouts.appVista')

@section('content')

<div class=" container">
    <div class="d-flex justify-content-center">
        <div >
            <div class="card bg-dark text-white text-center animate__animated animate__bounce" style="width: 26rem;">
                <div class="card-header text-warning">
                    <h4>LOGIN</h4>
                    </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('contraseyaLogin') }}">
                        @csrf

                        <div class="row mb-3 animate__animated animate__bounce">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                 name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 animate__animated animate__bounce" style="display: none">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" value="1" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div >
                            <button type="submit" class="btn btn-warning animate__animated animate__bounce">
                              OPEN
                            </button>
                        </div>

                        <div class=" mb-0" style="display: none">
                            <div class="">
                             

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center ">

<a class="nav-link" href="#" onclick="direccionarVista('register')"> Registrar</a>
</div>
@endsection
