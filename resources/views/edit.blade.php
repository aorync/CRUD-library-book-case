<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    @include('bootstrap-cdn.css')
</head>

<body>
    <div class="container">
        <form action="{{ url('update/' . $books->id) }}" class="m-5" method="POST">
            @csrf
            @method('PUT')

            <h2 class="text-center">Form Edit Data Buku</h2>

            <div class="mb-3">
                <label for="bookEditName">Judul Buku</label>
                <input type="text" class="form-control" name="bookEditName" value="{{ $books->book_name }}">
            </div>

            <div class="mb-3">
                <label for="editCategory">Kategori</label>
                <input type="text" class="form-control" name="editCategory" value="{{ $books->category }}">
            </div>

            <div class="mb-3">
                <label for="editWriter">Penulis</label>
                <input type="text" class="form-control" name="editWriter" value="{{ $books->writer }}">
            </div>

            <div class="mb-3">
                <label for="editYear">Tahun Terbit</label>
                <input type="number" class="form-control" name="editYear" value="{{ $books->years_release }}">
            </div>

            <div class="mb-3">
                <label for="editSinopsis">Sinopsis</label>
                <textarea name="editSinopsis" class="form-control" cols="30" rows="10">{{ $books->sinopsis }}</textarea>
            </div>

            <div class="mb-3">
                <label for="editTotalPage">Jumlah Halaman</label>
                <input type="number" name="editTotalPage" class="form-control" value="{{ $books->total_page }}">
            </div>

            <div class="mb-3">
                <label for="editStockbook">Jumlah Buku</label>
                <input type="number" name="editStockBook" class="form-control" value="{{ $books->stock_book }}">
            </div>

            <a href="{{ url('book') }}" class="btn btn-danger">Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>

            {{-- datanya sudah berhasil terambil, sekarang saya akan membuat button untuk simpan edit dan back --}}


        </form>
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
</style>
