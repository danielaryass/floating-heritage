<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Maritime Festival</title>
    <link rel="stylesheet" href="{{ asset('/backsite/assets/css/main/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backsite/assets/css/pages/auth.css') }}" />
    <link rel="shortcut icon" href="{{ asset('/backsite/assets/images/logo/favicon.svg') }}" type="image/x-icon" />
    <link rel="shortcut icon" href="{{ asset('/backsite/assets/images/logo/favicon.png') }}" type="image/png" />
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo"> 
                        <a href="/"><img
                                src="{{ asset('/backsite/assets/images/logo.jpeg') }}" alt="Logo" style="height: 70px"/></a>
                    </div>
                    <h1 class="auth-title">Log in.</h1>
                    <p class="auth-subtitle mb-5">
                        Silahkan Login Sesuai Email dan Password yang Diberikan Admin
                    </p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Email"
                                name="email" value="{{ old('email') }}" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password"
                                name="password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">
                            Log in
                        </button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4   ">
                        <p class="text-gray-600">
                            Tidak punya akun?
                            Silahkan hubungi Admin.
                        </p>

                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right" style="background-image: url({{ asset('/backsite/assets/images/logo.jpeg') }}); background-size: cover;" ></div>
            </div>
        </div>
    </div>
</body>

</html>
