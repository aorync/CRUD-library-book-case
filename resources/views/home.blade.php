<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    @include('bootstrap-cdn.css')
</head>

<body>

    {{-- kita membuat layout untuk halaman awal dari tampilan perpustakaan ini --}}

    <section class="header">
        <div class="welcome text-white text-center d-flex flex-column">
            <h2 class="header-text text-white">Selamat Datang Di Perpustakaan Rabbaanii</h2>
            <p class="text-white">Tempat dimana Anda dapat mencari buku-buku yang menarik dan bervariasi, mulai dari
                fantasi hingga aksi
                pun ada disini. Silahkan klik tombol dibawah ini untuk melihat daftar buku yang tersedia</p>
            <div class="group-btn d-flex justify-content-center mt-lg-2">
                <a href="#library" class="btn btn-list">
                    Klik Disini
                </a>

                <a href="{{ url('books') }}" class="btn btn-add-book">Tambahkan Buku Anda</a>
            </div>
        </div>
    </section>

    <section id="library" class="d-flex flex-column">

        <h2 class="text-header-library">Daftar Buku Tersedia</h2>

        <div class="row m-5">

            @foreach ($book as $b)
            {{-- untuk menampilkan card list buku yang tersedia --}}
                <div class="col-sm-6 my-3">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-left">
                                <b>{{ $b->book_name }}</b>
                            </li>
                        </ul>
                        <div class="card-body d-flex">
                            <div class="col-50-card m-3 w-50 d-flex flex-column">
                                <div class="col-card">
                                    <b>Kategori</b>
                                    <p>{{ $b->category }}</p>
                                </div>

                                <div class="col-card">
                                    <b>Tahun Terbit Buku</b>
                                    <p>{{ $b->years_release }}</p>
                                </div>

                                <div class="col-card alignjustify">
                                    <b>Sinopsis Buku</b>
                                    <p>{{ $b->sinopsis }}</p>
                                </div>
                            </div>

                            <div class="col-50-card m-3 w-50 d-flex flex-column">
                                <div class="col-card">
                                    <b>Penulis</b>
                                    <p>{{ $b->writer }}</p>
                                </div>

                                <div class="col-card">
                                    <b>Jumlah Halaman Buku</b>
                                    <p>{{ $b->total_page }}</p>
                                </div>

                                <div class="col-card">
                                    <b>Jumlah Buku Tersedia</b>
                                    <p>{{ $b->stock_book }}</p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            @endforeach

        </div>



    </section>

    @include('bootstrap-cdn.js')

</body>

</html>

<style>
    * {
        font-family: 'Poppins', sans-serif;
        scroll-behavior: smooth;
    }

    .header {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://wallpaperaccess.com/full/5487854.jpg');
        min-height: 100vh;
        background-position: center center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    .welcome {
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .group-btn {
        align-items: center;
    }

    .btn {
        margin-left: 24px;
        margin-right: 24px;
    }

    .btn-list {
        padding: 12px 24px;
        text-decoration: none;
        color: white;
        border: 2px solid crimson;
        border-radius: 24px;
        transition: .5s;
    }

    .btn-add-book {
        padding: 12px 24px;
        text-decoration: none;
        color: white;
        border: 2px solid cadetblue;
        border-radius: 24px;
        transition: .5s;
    }

    .btn-list:hover {
        background-color: crimson;
        transition: .5s;
    }

    .btn-add-book:hover {
        background: cadetblue;
        transition: .5s;
    }

    #library {
        min-height: 100vh;
        text-align: center;
    }

    .text-header-library {
        margin-top: 64px;
    }

    .card {
        box-shadow: rgba(0, 0, 0, 0.16) 0 10px 24px 0;
    }

    .col-card {
        text-align: justify;
    }
</style>


{{-- mungkin sekian yang saya bisa sampaikan, kurang lebih nya mohon maaf (diawal saya lupa untuk merekam salam)
    wa billahi taufiq wal hidayah , was salamu alaikum warahmatullahi wa barakatuh --}}
