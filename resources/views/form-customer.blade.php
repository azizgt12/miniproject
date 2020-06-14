          @extends('template/main')

          @section('title', 'Input Produk')

          @section('container')
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Form Input Data Customer</h6>
            </div>
            <div class="card-body">
			<form style="padding-left: 150px; padding-right: 150px;" method="POST" action="/customer">
				@csrf
			  <div class="form-group">
			    <label>Nama Customer</label>
			    <input class="form-control col-8" name="nama">
			  </div>
			  <div class="form-group">
			    <label>No Telp Customer</label><br>
			    <input class="form-control col-6" name="telp">
			  </div>
			  <div class="form-group">
			    <label>Email Customer</label>
			    <input class="form-control col-6" name="email">
			  </div>
			  <div class="form-group">
			    <label>Alamat Customer</label>
			    <textarea class="form-control col-6" rows="4" name="alamat"></textarea>
			  </div>
 			  <hr>
			  <button type="submit" class="btn btn-primary">Submit</button>
			</form>            
			</div>
          </div>
        @endsection
        <!-- /.container-fluid -->

