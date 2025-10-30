<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Bina Desa</title>

    <!-- Style Voler -->
    <link rel="stylesheet" href="{{ asset('assets-admin/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-admin/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets-admin/images/favicon.svg') }}" type="image/x-icon">
</head>

<body>
    <div id="auth">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12 mx-auto">
                    <div class="card pt-4">
                        <div class="card-body">

                            <div class="text-center mb-4">
                                <img src="{{ asset('assets-admin/images/favicon.svg') }}" height="60" class="mb-3">
                                <h3 class="text-success">Login Admin<br>Bina Desa</h3>
                                <p>Silahkan login untuk melanjutkan</p>
                            </div>

                            @if (session('error'))
                                <div class="alert alert-danger text-center">{{ session('error') }}</div>
                            @endif

                            <form method="POST" action="{{ route('auth.login') }}">
                                @csrf

                                <div class="form-group position-relative has-icon-left mb-3">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                    @error('username')
                                      <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group position-relative has-icon-left mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <div class="form-control-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                    @error('password')
                                      <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-success w-100 mt-3">
                                    Masuk
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Voler -->
    <script src="{{ asset('assets-admin/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets-admin/js/app.js') }}"></script>
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>

</body>
</html>
