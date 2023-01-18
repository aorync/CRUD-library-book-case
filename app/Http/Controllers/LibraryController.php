<?php

namespace App\Http\Controllers;

use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    // disini di Controller, kita akan mengatur data apa saja yang akan ditampilkan pada views/tampilan page, yang diambil dari database yg sudah kita buat
    // public function index(){
    //     $books = Library::get();
    //     return view('book', compact('books'));
    //     // return disini akan mengembalikan tampilan ke views yaitu book.blade.php dan akan mengambilkan variabel book yang datanya di dapat dari model Library
    // }

    public function edit($id){
        $books = Library::find($id);
        return view('edit', compact('books'));
    }

    public function tambahBuku(Request $request){
        $bookName = $request->bookName;
        $category = $request->category;
        $writer = $request->writer;
        $sinopsis = $request->sinopsis;
        $year = $request->year;
        $totalPage = $request->totalPage;
        $stockBook = $request->stockBook;
        // yg ini juga

        $l = new Library;
        $l->book_name = $bookName;
        $l->category = $category;
        $l->writer = $writer;
        $l->years_release = $year;
        $l->sinopsis = $sinopsis;
        $l->total_page = $totalPage;
        $l->stock_book = $stockBook;

        $l->save();
        return redirect()->back()->with('success', 'Berhasil Menambahkan Daftar Buku');
    }

    public function updateBook(Request $request, $id){
        // kenapa ada id disini ?
        // agar kita bisa mengedit data buku sesuai id buku tersebut
        $l = Library::find($id);
        $bookName = $request->input('bookEditName');
        $category = $request->input('editCategory');
        $writer = $request->input('editWriter');
        $year = $request->input('editYear');
        $sinopsis = $request->input('editSinopsis');
        $totalPage = $request->input('editTotalPage');
        $stockBook = $request->input('editStockBook');

        // tadi adalah contoh dimana ketika kita tidak memanggil name nya tidak sama dengan name di input maka
        // akan terjadi error, yaitu datanya tidak akan dikenali di database, dan dianggap null atau ?



        $l->book_name = $bookName;
        $l->category = $category;
        $l->writer = $writer;
        $l->years_release = $year;
        $l->sinopsis = $sinopsis;
        $l->total_page = $totalPage;
        $l->stock_book = $stockBook;

        $l->update();
        return redirect('book')->with('success', 'Berhasil Mengedit Data');
        // untuk , itu diisi berdasarkan nama route yang telah dibuat, karena nama route itu akan menjadi bagian dari URL
        // saya lupa menjelaskan untuk bagian yang , itu diisi berdasarkan name dari input yang ada
    }

    public function deleteBook($id){
        // penulisan yang tadi salah , harusnya 'id','=', $id, tapi tadi ditulis 'id' = $id
        // kenapa error ? karena sebenarnya laravel ini mengirim query berupa string karena tadi = tidak dibaca string, maka tanda = harus ditulis '=', dan untuk space harus memakai tanda ,
        Library::where('id', '=', $id)->delete();
        return redirect()->back()->with('deleted', 'Data Berhasil Dihapus');
    }

    public function welcome(){
        $book = Library::get();
        return view('home', compact('book'));
    }
}
