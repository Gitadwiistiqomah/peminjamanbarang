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
    $peminjaman = new Peminjamans (); // Gantilah ini dengan model yang sesuai
    $peminjaman->items_id = $request->items_id;
    $peminjaman->categories_id = $request->categories_id ;
    $peminjaman->name = $request->name;
    $peminjaman->kelas = $request->kelas;
    $peminjaman->waktu_peminjaman = $request->waktu_peminjaman;
    $peminjaman->status = $request->status;

    // Simpan ke database
    $peminjaman->save();

    // Redirect dengan pesan sukses
    return redirect()->route('form.index')->with('success', 'Data peminjaman berhasil disimpan.');
}

}
