<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Admin - Bina Desa</title>

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
                    <div class="card pt-4 shadow-lg border-0 rounded-4">
                        <div class="card-body">

                            <div class="text-center mb-4">
                                <img src="{{ asset('assets-admin/images/favicon.svg') }}" height="60" class="mb-3">
                                <h3 class="text-success fw-bold">Register Admin<br>Bina Desa</h3>
                                <p>Silahkan isi data di bawah untuk membuat akun</p>
                            </div>

                            @if (session('error'))
                                <div class="alert alert-danger text-center">{{ session('error') }}</div>
                            @endif

                            @if (session('success'))
                                <div class="alert alert-success text-center">{{ session('success') }}</div>
                            @endif

                            <form action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">Daftar</button>
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
