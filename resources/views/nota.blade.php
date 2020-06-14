          @extends('template/main')

          @section('title', 'Penjualan')

          @section('container')
       <div class="card shadow mb-4">
      <div class="card-header py-3">
      	<h6 class="m-0 font-weight-bold text-primary">Nota Penjualan</h6>
       </div>
       <div class="card-body">
       	<div class="table" style="color: black;">
       		<h5 style="color: black"><center><b>Nota Penjualan Produk</b></center></h5><hr style="height: 2px; background-color: black">
       		<div class="row mt-4" style="line-height: 0px;">
       			<div class="col-md-4 mb-4 mt-4">
       				<p style="font-size: 28px;"><b>I n v o i c e #</b></p>
       			</div>
       		</div>
                     @foreach($pen as $d)
       		<div class="row mt-3" style="line-height: 0px;">
       			<div class="col-md-2">
       				<p><b>No Invoice</b></p>
       			</div>
       			<div class="col-md-4">
       				<p><b> : {{$d->id}}</b></p>

       			</div>

       		</div>

       		<div class="row mt-3" style="line-height: 0px;">
       			<div class="col-md-2">
       				<p><b>Tanggal</b></p>
       			</div>
       			<div class="col-md-4">

       				<p><b> : <?= date('d F Y', strtotime($d->tgl)) ?></b></p>
       			</div>

       		</div>


       		<div class="row mt-3" style="line-height: 0px;">
       			<div class="col-md-2">
       				<p><b>Customer</b></p>
       			</div>
       			<div class="col-md-4">
                                   <p><b> : {{$d->namac}}</b></p>
       			</div>

       		</div>


       		<hr style="height: 2px; background-color: black">
       		<div class="row">
       			<div class="col-md-6 mt-2">
       				<h3>Invoice Total</h3>
       			</div>
       			
       			<div class="col-md-6 mt-2">
                                   <h3>Rp. <?= number_format($d->total) ?>,-</h3>

       			</div>
       		</div>
                     @endforeach
       		<hr style="height: 2px; background-color: black">
       		<table width="100%" class="table" style="color: black">
       			<tr style="font-size: 18px; font-weight: bold; color: black">
       				<th style="width: 160px;">Kode Produk</th>
       				<th>Nama Produk</th>
       				<th>Qty</th>
       				<th>Harga</th>
       				<th>Subtotal</th>
       			</tr>
                                   @foreach($detail as $det)
                            <tr>
                                   <td>{{ $det->id }}</td>
                                   <td>{{ $det->nama }}</td>
                                   <td>{{ $det->qty }}</td>
                                   <td>{{ $det->harga }}</td>
                                   <td>{{ $det->subtotal }}</td>
                            </tr>
                                   @endforeach

       		</table>
       		<a href="/penjualan" class="btn btn-danger"><span class="fa fa-hand-o-left"> Kembali</span></a>
       		
       		
       			

       	</div>
       </div>
   </div>
        @endsection
