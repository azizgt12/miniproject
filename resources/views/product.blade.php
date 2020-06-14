          @extends('template/main')

          @section('title', 'Product')

          @section('container')
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Produk</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <a href="/produk/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama</th>
                      <th>Kategori</th>
                      <th>Harga</th>
                      <th>Stok</th>
                      <th style="width: 200px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $dt)
                    <tr>
                      <td>0000{{ $dt->ids }}</td>
                      <td>{{ $dt->nama }}</td>
                      <td>{{ $dt->nama_kategori }}</td>
                      <td>Rp. <?= number_format($dt->harga) ?>,-</td>
                      <td>{{ $dt->stok }}</td>
                      <td>
                        <a href="produk/{{ $dt->ids }}/edit" class="btn btn-dark btn-sm">Edit</a>
                        <form action="produk/{{ $dt->ids }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        @endsection
        <!-- /.container-fluid -->
