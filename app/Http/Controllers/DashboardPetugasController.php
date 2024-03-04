<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Member;
use App\Models\Produk;

class DashboardPetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();

        $hasilpenjualan = DB::table('penjualans')->sum('total_harga');
        $produkterjual = DB::table('detail_penjualans')->sum('jumlah_produk');
        $member = Member::count();
        $produk = Produk::count();


        $data=[
            'user'=>$user,
            'hasilpenjualan'=>$hasilpenjualan,
            'produkterjual'=>$produkterjual,
            'member'=>$member,
            'produk'=>$produk,


        ];
        return view('petugas.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
