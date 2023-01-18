<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    @include('bootstrap-cdn.css')
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="wrap d-flex flex-column align-items-center justify-content-center min-vh-100">
                <div class="box p-lg-5">

                    <form action="{{ url('register-user') }}" method="POST" class="d-flex flex-column">
                        @csrf

                        <h2 class="text-center">Form Register</h2>

                        <div class="mb-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                            <span class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            <span class="text-danger">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" value="{{ old('password') }}">
                            <span class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <div class="mb-3">
                            <p>Sudah Punya Akun ? <a class="btn-to-register" href="{{ url('login') }}">Masuk</a></p>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary align-items-center w-100">Daftar</button>
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

        width: 100%;
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://wallpaperaccess.com/full/5487854.jpg');
        min-height: 100vh;
        min-width: 100vw;
        background-attachment: fixed;
        background-position: center center;
        background-repeat: no-repeat;
        background-size: cover;
    }

    .box {
        box-shadow: rgba(0, 0, 0, 0.16) 0 10px 24px 0;
        border-radius: 16px;
        background: white;
    }
</style>
