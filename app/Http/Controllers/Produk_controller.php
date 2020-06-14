<?php

namespace App\Http\Controllers;

use App\Produk_model;
// use App\Kategori_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Produk_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('produk')
            ->leftjoin('kategori', 'produk.kategori', '=', 'kategori.id')
            ->select('*', 'produk.id as ids')
            ->get();

        // $data = \App\Produk_model::all();   


        return view('product', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = \App\Category_model::all();   
    
        return view('form_produk', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Produk_model::create($request->all());

        return redirect('/produk')->with('status', 'Sukses Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produk_model  $produk_model
     * @return \Illuminate\Http\Response
     */
    public function show(Produk_model $produk_model)
    {
        //

        return $produk_model;
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produk_model  $produk_model
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk_model $produk_model)
    {
        // return $produk_model;
        $data = \App\Category_model::all();   

        return view('form-edit-produk', compact('produk_model'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produk_model  $produk_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk_model $produk_model)
    {
        //

        Produk_model::where('id', $produk_model->id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori' => $request->kategori,
            'stok' => $request->stok
        ]);

        return redirect('/produk')->with('status', 'Sukses Ubah Data!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produk_model  $produk_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk_model $produk_model)
    {
        //
        Produk_model::destroy($produk_model->id);
        return redirect('/produk')->with('status', 'Sukses Hapus Data!');

        // return $produk_model;
    }
}
