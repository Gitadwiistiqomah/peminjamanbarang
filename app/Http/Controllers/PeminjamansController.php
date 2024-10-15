<?php

namespace App\Http\Controllers;

use App\Models\Peminjamans;
use Illuminate\Http\Request;

class PeminjamansController extends Controller
{
    public function index()
    {
    $peminjaman = Peminjamans::with(['items', 'categories'])->get(); // pastikan 'item' dan 'category' adalah relasi yang benar
    return view('pages.peminjaman.index', compact('peminjaman'));
}

        // $peminjaman = Peminjamans::orderBy('created_at', 'DESC')->get();
        // return view ('pages.peminjaman.index', compact('peminjaman'));
    

    public function show($id)
    {

        $peminjaman = Peminjamans::with('items', 'categories')->findOrFail($id);
        return view('pages.peminjaman.show', compact('peminjaman'));

        // $peminjaman = Peminjamans::find($id);
        // return view ('pages.peminjaman.show', compact('peminjaman'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjamans::find($id);
        $peminjaman->delete();
        return redirect()->route ('admin.peminjaman.index');
    }
}

