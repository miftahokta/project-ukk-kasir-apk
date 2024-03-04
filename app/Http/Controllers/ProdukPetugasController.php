<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\Produk;
use Alert;

class ProdukPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('petugas.produk.index', compact('produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            // 'gambar' => 'required|image|mimes:png,jpg|max:5000'
        ]);

        // $gambar = $request->gambar;
        // $slug = Str::slug($gambar->getClientOriginalExtension());
        // $new_gambar = time() .'.'. $slug;
        // $gambar->move('produk/file/', $new_gambar);

        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        // $produk->gambar = 'produk/file/'.$new_gambar;
        $produk->save();

        Alert::success('Selamat', 'Produk Berhasil Ditambahkan');
        return redirect()->route('produkpetugas');
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
        $produk = Produk::find($id);
        return view('petugas.produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_produk' => 'required|max:255',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            // 'gambar' => 'required|image|mimes:png,jpg|max:5000'
        ]);

        $produk = Produk::find($id);

        // if($request->hasFile('gambar')){
        //     $request->validate([
        //         'gambar' => 'required|image|mimes:png,jpg|max:5000'
        //     ]);
        //     File::delete($produk->gambar);
        //     $gambar = $request->gambar;
        //     $slug = Str::slug($gambar->getClientOriginalExtension());
        //     $new_gambar = time() .'.'. $slug;
        //     $gambar->move('produk/file/', $new_gambar);
        //     $produk->gambar = 'produk/file/'.$new_gambar;
        // }

        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->save();

        Alert::success('Selamat', 'Produk Berhasil Diedit');
        return redirect()->route('produkpetugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::destroy($id);
        Alert::success('Selamat', 'Produk Berhasil Dihapus');
        return redirect()->route('produkpetugas');
    }
}
