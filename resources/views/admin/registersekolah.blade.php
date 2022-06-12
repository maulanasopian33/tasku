@extends('layouts.app')

@section('content')


<!-- MultiStep Form -->
<div class="row">
    <div class="col">
        <img src="{{ asset('img') }}/Herologin.png" width="100%" alt="">
    </div>
    <div class="col-md-6 col-md-offset-3">
        <form id="msform" method="POST" action="{{ route('prosesregistrasisekolah') }}">
            @csrf
            <!-- progressbar -->
            <ul id="progressbar">
                <li class="active">Informasi Sekolah</li>
                <li>Informasi Akun</li>
            </ul>
            <!-- fieldsets -->
            <fieldset>
                <h2 class="fs-title">Informasi Sekolah</h2>
                <h3 class="fs-subtitle">Masukan infomasi yang dibutuhkan terkait sekolah</h3>
                <input type="text" placeholder="Nama Sekolah" class="@error('nama sekolah') is-invalid @enderror" name="nama sekolah" value="{{ old('nama sekolah') }}" required autocomplete="nama sekolah" autofocus />
                @error('nama sekolah')
                    <span class="invalid-feedback" role="alert">
                        <strong>Silahkan isikan nama sekolahan</strong>
                    </span>
                @enderror
                <input type="text" name="alamat" placeholder="Alamat Sekolah" class="@error('alamat') is-invalid @enderror" required autocomplete="alamat" autofocus  value="{{ old('alamat') }}"/>
                @error('alamat')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="button" name="next" class="next action-button" value="Lanjut"/>
            </fieldset>
            <fieldset>
                <h2 class="fs-title">Create your account</h2>
                <h3 class="fs-subtitle">Fill in your credentials</h3>
                <input type="text" name="username" placeholder="Username" id="username" type="text" class=" @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="text" name="email" placeholder="Email" id="email" type="email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="password" placeholder="Password" id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="password" name="repassword" placeholder="Konfirmasi Password" id="repassword" type="password" class="@error('repassword') is-invalid @enderror" required autocomplete="new-password">
                @error('repassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <input type="button" name="previous" class="previous action-button-previous" value="Kembali"/>
                <input type="submit" name="submit" class="submit action-button" value="Daftar"/>
            </fieldset>
        </form>
        @if(Session::has('error'))
                <div class="bg-danger p-3 mx-5 my-3 rounded text-white align-items-center justify-content-center"> <i class="fa-solid fa-2x mr-3 fa-circle-exclamation"></i>{{ Session::get('error') }}</div>
            
        @endif
    </div>
</div>
<!-- /.MultiStep Form -->
 @endsection
