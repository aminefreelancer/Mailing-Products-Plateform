@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col mx-auto">
        <div class="row justify-content-center">
            <div class="col-xl-4 col-lg-12">
                <div class="bg-white text-dark br-7 br-tl-0 br-bl-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <a href="./" class="">
                                <img src="images/logo.png" alt="">
                            </a>
                        </div>
                        <form class="mt-5" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="input-group mb-4">
                                    <div class="input-group-text">
                                        <i class="fe fe-user"></i>
                                    </div>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" name="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group" id="Password-toggle">
                                    <a href="" class="input-group-text">
                                    <i class="fe fe-eye" aria-hidden="true"></i>
                                    </a>
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Mot de passe" name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="custom-control custom-checkbox">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" />
                                    <span class="custom-control-label">Rester connecté</span>
                                </label>
                            </div>
                            <div class="form-group text-center mb-3">
                                <button type="submit" class="btn btn-primary btn-lg w-100 br-7">Connexion</button>
                            </div>
                            
                            <div class="form-group fs-14 text-center font-weight-bold">
                                <a href="#">Mot de passe oublié</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
