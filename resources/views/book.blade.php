<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Buku</title>
    @include('bootstrap-cdn.css')
    {{-- ini untuk memanggil css --}}
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#"><b>Perpustakaan Rabbaanii</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                </ul>
                <h6 class="my-3 mx-3">Selamat Datang ,Admin Rabbaanii <b>{{$userLogin->name}}</b></h6>
                <a href="{{url('logout')}}" style="text-decoration: none" class="text-danger"><i
                        class="fa-solid fa-right-from-bracket text-danger"></i> <b>Logout</b></a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::has('deleted'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('deleted') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- ini digunakan untuk menampilkan alert ketika menghapus / merubah / mengupdate data --}}


        <h2 class="text-center"><b>Daftar Buku Perpustakaan Rabbaanii</b></h2>

        {{-- sekarang saya akan membuat modal untuk mengisi form agar bisa menambahkan data buku --}}

        <!-- Button trigger modal -->

        <div class="action-btn d-flex">

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
               <i class="fa-solid fa-plus"></i>  Tambah Buku
            </button>

            <a href="{{url('/')}}" class="btn btn-danger ms-auto">
                <i class="fa-solid fa-gauge text-white"></i> Dashboard
            </a>





        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form Tambah Buku</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form action="{{ url('tambah') }}" method="POST">

                        @csrf

                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="bookName">Nama Buku</label>
                                <input type="text" class="form-control" name="bookName" required>
                            </div>

                            <div class="mb-3">
                                <label for="category">Kategori</label>
                                <input type="text" class="form-control" name="category" required>
                            </div>

                            <div class="mb-3">
                                <label for="writer">Penulis</label>
                                <input type="text" class="form-control" name="writer" required>
                            </div>

                            <div class="mb-3">
                                <label for="year">Tahun Terbit</label>
                                <input type="number" min="1900" step="1" max="2099" class="form-control"
                                    name="year" required>
                            </div>

                            <div class="mb-3">
                                <label for="sinopsis">Sinopsis</label>
                                <textarea class="form-control" name="sinopsis" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="totalPage">Jumlah halaman</label>
                                <input type="number" class="form-control" name="totalPage" required>
                            </div>

                            <div class="mb-3">
                                <label for="stockBook">Jumlah Buku</label>
                                <input type="number" class="form-control" name="stockBook" required>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Reset</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>

        <table class="table my-5">
            <thead>
                <tr class="table-dark text-center">
                    <th>No</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Tahun Terbit</th>
                    <th>Sinopsis</th>
                    <th>Jumlah Halaman</th>
                    <th>Jumlah Buku</th>
                    <th>Action</th>
                </tr>
            </thead>

            @php
                $no = 1;
            @endphp

            <tbody>
                @foreach ($books as $b)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ $b->book_name }}</td>
                        <td class="text-center">{{ $b->writer }}</td>
                        <td class="text-center">{{ $b->category }}</td>
                        <td class="text-center">{{ $b->years_release }}</td>
                        <td class="text-center">{{ Str::limit($b->sinopsis, 28) }}</td>
                        <td class="text-center">{{ $b->total_page }}</td>
                        <td class="text-center">{{ $b->stock_book }}</td>
                        <td class="text-center">
                            <div class="action-button d-flex">
                                {{-- setelah kita membuat route untuk edit kita akan manggil disini --}}
                                <a href="{{ url('edit/' . $b->id) }}" class="btn btn-primary btn-sm mx-2">Edit</a>
                                <a href="{{ url('delete/' . $b->id) }}" class="btn btn-danger btn-sm mx-2">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    {{-- disini kita mengamb@auth

                    @endauthil data dari table di database dan di tampilkan di table ini --}}
                @endforeach
            </tbody>

        </table>

    </div>

    @include('bootstrap-cdn.js')
    {{-- ini untuk memanggil js --}}

</body>

</html>


{{-- setelah berhasil menampilkan data seperti ini, saya akan membuat authentication untuk login
    serta table user --}}
