<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posyandu;

class PosyanduController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data ['dataPosyandu'] = Posyandu::all();
        return view('admin.posyandu.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posyandu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($requuest->all());
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'rt' => 'required|numeric',
        'rw' => 'required|numeric',
        'kontak' => 'required',
    ]);

    $data['nama'] = $request->nama;
    $data['alamat'] = $request->alamat;
    $data['rt'] = $request->rt;
    $data['rw'] = $request->rw;
    $data['kontak'] = $request->kontak;

    Posyandu::create($data);

    return redirect()->route('posyandu.index')->with('success', 'Data posyandu berhasil ditambahkan!');

}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $posyandu = Posyandu::findOrFail($id);
        return view('admin.posyandu.edit', ['posyandu' => $posyandu]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
    $posyandu_id = $id;
    $posyandu = Posyandu::findOrFail($posyandu_id);
    $posyandu->nama = $request->nama;
    $posyandu->alamat = $request->alamat;
    $posyandu->rt = $request->rt;
    $posyandu->rw = $request->rw;
    $posyandu->kontak = $request->kontak;
    $posyandu->save();
    
    //redirect
    return redirect()->route('posyandu.index')->with('success', 'Perubahan databerhasil!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $posyandu = Posyandu::findOrFail($id);
        $posyandu->delete();

        return redirect()
            ->route('posyandu.index')
            ->with('success', 'Data berhasil dihapus');
    }
}
