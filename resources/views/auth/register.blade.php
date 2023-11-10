<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    
        <title>{{ config('app.name', 'Laravel') }}</title>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        @vite(['resources/sass/app.scss', 'resources/css/app.css'])

    </head>
<body>
<div class="container">
    <div class="row justify-content-center mt-5">
        
        <div class="col-md-4 mt-5">
            <h1 class="header">ABC BANK</h1>
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                    <div class="header-card mb-3 mt-3">{{ __('Create new account') }}</div>
                        <div class="row mb-3">
                            <div class="col-12">
                                <div class="form-group mb-4">
                                <label for="name">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        
                                <div class="form-group mb-4">
                                    <label for="email">{{ __('Email Address') }}</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        

                                <div class="form-group mb-4">
                                    <label for="password">{{ __('Password') }}</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    
                                </div>

                                {{-- <div class="form-group mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    
                                </div> --}}
                                
                                <div class="form-group">
                                    
                                   <p>Agree the <a href="{{ route('terms-and-policy') }}">terms and policy</a></p>
                               
                                </div>
                                <div class="form-group">
                                    
                                        <button type="submit" class="w-100 btn btn-primary">
                                            {{ __('Register') }}
                                        </button>
                                   
                                </div>
                    </form>
            </div>
            
        </div>
        
    </div>
    
</div>
<div class="form-group mt-4 text-center">
    <p>Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
</div>
</body>
</html>
