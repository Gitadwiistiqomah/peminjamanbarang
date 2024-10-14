<?php

namespace App\Http\Controllers;

use App\Models\Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemsController extends Controller
{
    public function index()
    {
        $items = Items::all();
        return view('pages.item.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('pages.item.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $request->validate([
        //     'namebarang' => 'required',
        //     'lokasi'=> 'required',
        //     // 'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // 'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:6048',
           
        // ], [
        //     'namebarang.required' => 'namebarang harus diisi.',
        //     'lokasi.required' => 'lokasi harus diisi', 
        // ]);

        // $imageName = time(). '.' .$request->foto->extension();
        // Storage::putFileAs(
        //     'public/uploads/peminjamanbarang', 
        //     $request->foto, 
        //     $imageName
        // );
        // $items = Items::create([
        //     'namebarang'=> $request->namebarang,
        //     'lokasi'=> $request->lokasi,
        //     'foto'=> $imageName,
            
        // ]);

        // return redirect()->route('admin.items.index');
         $request->validate([
             'namebarang' => 'required',
             'lokasi'=> 'required',
        ], [
             'namebarang.required' => 'namebarang harus diisi.',
             'lokasi.required' => 'lokasi harus diisi',  
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

         $items = Items::find($id); //SELECT * FROM siswa Where id = $id
         return view('pages.item.show', compact ('items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit (string $id)
    {
        $items = Items::find($id);
        return view('pages.item.edit', compact ('items'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // $request->validate([
        //     'namebarang' => 'required',
        //     'lokasi'=> 'required',
        //     'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     // 'foto' => 'required|mimes:jpeg,png,jpg,gif,svg|max:6048',
        // ]);

        // $items = Items::find($id);

        // if($request->has('foto')){
        //     //upload Cover
        //     $imageName = time(). '.' .$request->foto->extension();
        //     Storage::putFileAs(
        //         'public/uploads/peminjamanbarang', //lokasi upload file
        //         $request->foto, //input file dari form
        //         $imageName
        //     );

        // }else{
        //     $imageName = $items->foto;
        // }

        // $items->namebarang = $request->namebarang;
        // $items->lokasi = $request->lokasi;
        // $items->foto = $imageName;
        // $items->save();
        // return redirect()->route('admin.items.index');
        
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


