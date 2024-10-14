<?php

namespace App\Http\Controllers;

use App\Models\Peminjamans;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjamans::orderBy('created_at', 'DESC')->get();
        return view('pages.peminjaman.index', compact('peminjaman'));
    }

    public function show($id)
    {
        $peminjaman = Peminjamans::find($id);
        return view('pages.peminjaman.show', compact('peminjaman'));
    }

    public function destroy($id)
    {
        $peminjaman = Peminjamans::find($id);
        $peminjaman->delete();
        return redirect()->route('admin.peminjaman.index');
    }
}
