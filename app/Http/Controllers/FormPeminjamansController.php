<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Items;
use App\Models\Peminjamans;
use Illuminate\Http\Request;

class FormPeminjamansController extends Controller
{
    public function index()
    {
        $items = Items::all();
        $categories = Categories::all();
        return view('pages.form', compact('items', 'categories'));

    }
    
    public function store(Request $request)
{
    // Validasi data
    $request->validate([
        'items_id' => 'required',
        'categories_id' => 'required',
        'name' => 'required|string|max:255',
        'kelas' => 'required|string|max:255',
        'waktu_peminjaman' => 'required|date',
        'status' => 'required|string|max:255',
    ]);

    // Simpan data
    $peminjamans = new Peminjamans(); // Gantilah ini dengan model yang sesuai
    $peminjamans->items_id = $request->items_id;
    $peminjamans->categories_id = $request->categories_id ;
    $peminjamans->name = $request->name;
    $peminjamans->kelas = $request->kelas;
    $peminjamans->waktu_peminjaman = $request->waktu_peminjaman;
    $peminjamans->status = $request->status;

    // Simpan ke database
    $peminjamans->save();

    // Redirect dengan pesan sukses
    return redirect()->route('form.index')->with('success', 'Data berhasil disimpan.');
}

}
