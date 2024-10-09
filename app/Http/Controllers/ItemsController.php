<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\Members;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    public function index()
    {

        $items = Items::select('items.*', 'members.nama as nama_members')
        ->join('members', 'items.members_id', '=', 'members.id')
        ->get();

        return view('pages.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Members::all();
        return view('pages.item.create', compact('members'));
        // return view('pages.item.create');
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

        
       $items = Items::create ($request->all());
       return redirect()->route('admin.items.index'); 
       // return "Proses simpan";
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $items = Items::with('members')->findOrFail($id);
        return view('pages.item.show', compact('items'));
        // $items = Items::find($id); //SELECT * FROM siswa Where id = $id
        // return view('pages.item.show', compact ('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $items = Items::find($id);
        return view('pages.item.edit', compact ('items'));
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

        $items = Items::find($id);
        $items->update($request->all());
        return redirect()->route('admin.items.index');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $items = Items::find($id);
        $items->delete();
        return redirect()->route('admin.items.index');
    }
}


