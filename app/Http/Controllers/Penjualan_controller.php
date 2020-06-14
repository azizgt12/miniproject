<?php

namespace App\Http\Controllers;

use App\Penjualan_model;
use App\Produk_model;
use App\Customer_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class Penjualan_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = DB::table('penjualan')
            ->leftjoin('customer', 'customer.id', '=', 'penjualan.customer')
            ->select('*', 'penjualan.id as ids')
            ->get();

            return view('penjualan', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $price = DB::table('temp')
                    ->sum('sub');
        $data = \App\Penjualan_model::all();
        $cust = \App\Customer_model::all();
        $prod = \App\Produk_model::all();
        return view('cart', ['data'=> $data, 'cust'=>$cust, 'price'=>$price, 'prod' => $prod]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $produk = Produk_model::find($request->produk);
        $nama   = $produk->nama;
        $harga  = $produk->harga;
        $sub    = $request->qty * $harga;
        $kode   = $request->input('produk');
        $qty    = $request->input('qty');

        $temp = Penjualan_model::find($request->produk);

        if(is_null($temp)){
            $data=array('id'=>$kode,"qty"=>$qty, 'nama'=>$nama, 'harga'=>$harga, 'sub'=> $sub );
            DB::table('temp')->insert($data);          
        }else{            
            $stok = $temp->qty + $qty;
            $subt = $stok * $harga;
            $data=array('qty'=>$stok, 'sub'=>$subt);
            DB::table('temp')->where('id', $produk->id)->update($data);
        }       

        return redirect('/penjualan/create');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penjualan_model  $penjualan_model
     * @return \Illuminate\Http\Response
     */
    public function cek(Request $request)
    {
       $data=array('id'=>$request->id,"customer"=>$request->customer, 'tgl'=>date('Y-m-d H:i:s'), 'total'=>$request->jumlah);
        DB::table('penjualan')->insert($data);      

        $temp = DB::table('temp')->get();

        foreach ($temp as $key) {
            DB::table('detail_penjualan')->insert([
                'id' => $request->id,
                'produk' => $key->id,
                'harga' => $key->harga,
                'qty' => $key->qty,
                'subtotal' => $key->sub
            ]);

            $p = Produk_model::find($key->id);
            $stok = $p->stok - $key->qty;

            $dt=array('stok'=>$stok);
            DB::table('produk')->where('id', $key->id)->update($dt);
        }

        DB::table('temp')->delete();

        return redirect('/penjualan/'.$request->id);

    }

    public function show($penjualan_model)
    {
        $pen = DB::table('penjualan')
                ->Join('customer', 'customer.id', '=', 'penjualan.customer')
                ->where('penjualan.id', $penjualan_model)
                ->select('penjualan.*', 'customer.nama as namac')
                ->get(); 

        $detail = DB::table('detail_penjualan')
                    ->Join('produk', 'produk.id', '=', 'detail_penjualan.produk')
                    ->where('detail_penjualan.id', $penjualan_model)
                    ->get();
                
        return view('nota', compact('pen'), compact('detail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjualan_model  $penjualan_model
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan_model $penjualan_model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjualan_model  $penjualan_model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan_model $penjualan_model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan_model  $penjualan_model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan_model $penjualan_model)
    {
        Penjualan_model::destroy($penjualan_model->id);
        return redirect('/penjualan/create');
    }
}
