<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categories;
use App\Models\Peminjamans;
use Illuminate\Http\Request;

class PeminjamansController extends Controller
{
    
    public function index()
    {
        $peminjaman = Peminjamans::with(['items', 'categories'])->get();
        
        return view('pages.peminjaman.index', compact('peminjaman')); // Mengembalikan view dengan data peminjaman
    }

    public function show($id)
    {
        $peminjaman = Peminjamans::with('items', 'categories')->findOrFail($id);
        return view('pages.peminjaman.show', compact('peminjaman'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjamans::find($id);
        $peminjaman->delete();
        return redirect()->route('admin.peminjamans.index');
    }
}
