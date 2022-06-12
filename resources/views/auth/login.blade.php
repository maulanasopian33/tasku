@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center align-items-center" style="height:100vh;">
        <div class="col-md-5">
            <img src="{{ asset('img') }}/Herologin.png" width="100%" alt="">
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @if(Session::has('error'))
                        <div class="alert bg-danger m-2 p-3 text-white alert-dismissible fade show" role="alert">{{ Session::get('error') }}</div>
                    @endif
                    @if(Session::has('berhasil'))
                        <div class="bg-success m-2 p-3 text-white alert-dismissible fade show" role="alert">{{ Session::get('berhasil') }}</div>
                    @endif
                    
                    <form method="POST" action="{{ route('proseslogin') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username/Email') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('email') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="d-grid col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="alert alert-success m-2 md-mx-4 md-my-2" role="alert">
                            Jika anda tidak memiliki akun, silahkan hubungi admin sekolah untuk mendapatkan akun TASKU
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
