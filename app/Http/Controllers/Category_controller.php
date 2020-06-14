<?php

namespace App\Http\Controllers;

use App\Category_model;
use Illuminate\Http\Request;

class Category_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = \App\Category_model::all();

        return view('category', compact('data'));   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category_model::create($request->all());

        return redirect('/category')->with('status', 'Sukses Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category_model  $category_model
     * @return \Illuminate\Http\Response
     */
    public function show(Category_model $category_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category_model  $category_model
     * @return \Illuminate\Http\Response
     */
    public function edit(Category_model $category_model)
    {
        //

        return view('form-edit-kategori', compact('category_model'));   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category_model  $category_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category_model $category_model)
    {
        Category_model::where('id', $category_model->id)->update([
            'nama_kategori' => $request->nama_kategori,
            'ket' => $request->ket
        ]);

        return redirect('/category')->with('status', 'Sukses Ubah Data!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category_model  $category_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category_model $category_model)
    {
        Category_model::destroy($category_model->id);
        return redirect('/category')->with('status', 'Sukses Hapus Data!');
    }
}
