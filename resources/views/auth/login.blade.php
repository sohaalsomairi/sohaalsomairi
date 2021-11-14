
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>تسجيل دخول</title>

        <!-- Fonts -->
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link href="/css/all.css" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">

    </head>
    <body>
        <div class="login-bg">
            <div class="login-form">
                <div class="container">
                    <h1 class="form-title">Login</h1>


                    <form method="post" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                          <label for="">Username</label>
                          <input type="text" name="username" class="form-control custom-input" placeholder="Type your Username here">
                        </div>
                        <div class="form-group">
                          <label for="">Password</label>
                          <input type="password" name="password" class="form-control custom-input" placeholder="Type your Password here">
                        </div>
                        <a href="{{ route('register') }}">Register</a>
                        <button type="submit" class="btn-submit">Login</button>
                      </form>

                </div>
            </div>
        </div>

    </body>
</html>
