<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    @include('bootstrap-cdn.css')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="wrap d-flex flex-column justify-content-center align-items-center min-vh-100">
                <div class="box p-lg-5">


                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (Session::has('fail'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ url('login-user') }}" method="GET" class="d-flex flex-column">

                        @csrf

                        <h2 class="text-center">Form Login</h2>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                            {{-- {{old('email')}} untuk menyimpan data lama, misal ketika email yg dimasukkan tidak terdaftar di database
                             jika tidak ditambahkan old('email')  ini maka ketika itu juga email yg diinput terhapus

                             dan fungsi dari error ini adalah untuk menampilkan error apabila email kosong atau tidak diisi --}}
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <p>Belum Punya Akun ? <a class="btn-to-register" href="{{ url('register') }}">Daftar</a></p>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary align-items-center w-100">Masuk</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('bootstrap-cdn.js')
</body>

</html>

<style>
    * {
        box-sizing: border-box;
        font-family: 'Poppins', sans-serif;
        scroll-behavior: smooth;
    }

    .container {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://wallpaperaccess.com/full/5487854.jpg');
        min-height: 100vh;
        min-width: 100vw;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
    }

    .box {
        box-shadow: rgba(0, 0, 0, 0.16) 0 10px 24px 0;
        border-radius: 16px;
        background: white
    }

    .btn-to-register {
        text-decoration: none;
        transition: .3s
    }

    .btn-to-register:hover {
        color: skyblue;
        transition: .3s
    }
</style>
