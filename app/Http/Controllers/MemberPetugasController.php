<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Alert;

class MemberpetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::all();
        return view('petugas.user.index', compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_member' => 'required|max:255',
            'jenis_kelamin' => 'required|max:10',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|max:255',
        ]);

        $member = Member::create([
            'nama_member' => $request->nama_member,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        Alert::success('Selamat', 'Produk Berhasil Ditambahkan');
        return redirect()->route('memberpetugas');
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
        $member = Member::find($id);
        return view('petugas.user.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_member' => $request->nama_member,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ]);

        $member = Member::find($id);

        $member->nama_member = $request->nama_member;
        $member->jenis_kelamin = $request->jenis_kelamin;
        $member->alamat = $request->alamat;
        $member->no_telp = $request->no_telp;
        $member->save();

        Alert::success('Selamat', 'Produk Berhasil Diedit');
        return redirect()->route('memberpetugas');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Member::destroy($id);
        Alert::success('Selamat', 'Akun Berhasil Dihapus');
        return redirect()->route('memberpetugas');
    }
}
