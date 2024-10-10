<?php

namespace App\Http\Controllers;

use App\Models\Items;
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
        return view('pages.form', compact('items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullname' => 'required|min:5|max:128',
            'institution_id' => 'required',
            'from' => 'required|min:3|max:255',
            'email' => 'required|email|max:64',
            'phonenumber' => 'required|min:10|max:16',
            'note' => 'required',
        ]); 

        $peminjaman =Peminjamans ::create($request->all());
        return redirect()->route('form.index')
        ->with('success', 'Data kamu sudah disimpan.');

    }
}
