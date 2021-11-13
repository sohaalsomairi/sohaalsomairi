
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/all.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

    </head>
    <body>
        <div class="login-bg">
            <div class="register-form">
                <div class="container">
                    <h1 class="form-title">Register</h1>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="empnum" class=" col-form-label text-md-right">{{ __('Employee numder') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="empnum" type="text" class="form-control @error('empnum') is-invalid @enderror" name="empnum" value="{{ old('empnum') }}" required autocomplete="name" autofocus>

                                @error('empnum')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="username" class=" col-form-label text-md-right">{{ __('Username') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="superuser" class=" col-form-label text-md-right">{{ __('is superuser ?') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="superuser" type="superuser" class="form-control @error('superuser') is-invalid @enderror" name="superuser" placeholder="1 for super user 0 for none super user" value="{{ old('superuser') }}" required autocomplete="email">

                                @error('superuser')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="password" class="col-form-label text-md-right">{{ __('Password') }}</label>
                            </div>
                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                            <label for="password-confirm" class="col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                            </div>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <a href="{{ route('login') }}">Login</a>

                        <div class="form-group row mb-0">
                                <button type="submit" class="btn-submit">
                                    {{ __('Register') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </body>
</html>
