<?php

namespace App\Http\Controllers;

use App\Customer_model;
use Illuminate\Http\Request;

class Customer_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = \App\Customer_model::all();   
        return view('customer', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form-customer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        Customer_model::create($request->all());

        return redirect('/customer')->with('status', 'Sukses Tambah Data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer_model  $customer_model
     * @return \Illuminate\Http\Response
     */
    public function show(Customer_model $customer_model)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer_model  $customer_model
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer_model $customer_model)
    {
        // return $customer_model;

        return view('form-edit-customer', compact('customer_model'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer_model  $customer_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer_model $customer_model)
    {

        Customer_model::where('id', $customer_model->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telp' => $request->telp,
            'alamat' => $request->alamat
        ]);

        return redirect('/customer')->with('status', 'Sukses Ubah Data!');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer_model  $customer_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer_model $customer_model)
    {
        //
        Customer_model::destroy($customer_model->id);
        return redirect('/customer')->with('status', 'Sukses Hapus Data!');

    }
}
