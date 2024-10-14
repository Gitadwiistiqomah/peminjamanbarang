<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Categories;
use App\Models\Peminjamans;
use Illuminate\Http\Request;

class FormPeminjamanController extends Controller
{
/*************  ✨ Codeium Command ⭐  *************/
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
/******  e395f68d-6c19-424f-a395-ec98bad00398  *******/   

    public function index()
    {
        $items = Items::all();
        $categories = Categories::all();
        return view('pages.form', compact('items', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items_id' =>'required',
            'categories_id' =>'required',
            'name' => 'required',
            'kelas' => 'required',
            'waktu_peminjaman' => 'required',
            'waktu_kembali' => 'required',
            'staus' => 'required',
        ]); 

        $peminjaman =Peminjamans ::create($request->all());
        return redirect()->route('form.index')
        ->with('success', 'Data kamu sudah disimpan.');

    }
}
