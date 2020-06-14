          @extends('template/main')

          @section('title', 'Input Produk')

          @section('container')
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Input Data Produk</h6>
            </div>
            <div class="card-body">
			<form style="padding-left: 150px; padding-right: 150px;" method="POST" action="/produk">
				@csrf
			  <div class="form-group">
			    <label>Nama Produk</label>
			    <input class="form-control col-8" name="nama">
			  </div>
			  <div class="form-group">
			    <label>Kategori</label><br>
			    <select class="custom-select col-6" name="kategori">
			    	<option selected="" disabled="">Pilih Salah Satu</option>
			    	@foreach($data as $d)
			    	<option value="{{ $d->id }}">{{ $d->nama_kategori }}</option>
			    	@endforeach
			    </select>
			  </div>
			  <div class="form-group">
			    <label>Harga </label>
			    <input class="form-control col-6" name="harga">
			  </div>
			  <div class="form-group">
			    <label>Stok</label>
			    <input class="form-control col-3" name="stok">
			  </div>
 			  <hr>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>            
			</div>
          </div>
        @endsection
        <!-- /.container-fluid -->

