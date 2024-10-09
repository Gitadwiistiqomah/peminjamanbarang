<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class MembersController extends Controller
{
    public function index()
    {
        $members = Members::all(); // Mengambil semua data members dari database
     return view('pages.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:128',
        ], [
            'name.required' => 'Name harus diisi.',
            
        ]);

       $members = Members::create($request->all());
       return redirect()->route('admin.members.index'); 
       // return "Proses simpan";
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $members = Members::find($id); //SELECT * FROM siswa Where id = $id
        return view('pages.members.show', compact ('members'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $members = Members::find($id);
        return view('pages.members.edit', compact ('members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:128',
        ], [
            'name.required' => 'Name harus diisi.',
            
        ]);

        $membres = Members::find($id);
        $membres->update($request->all());
        return redirect()->route('admin.members.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $membres = Members::find($id);
        $membres->delete();
        return redirect()->route('admin.membres.index');
    }
}

