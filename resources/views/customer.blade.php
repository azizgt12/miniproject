          @extends('template/main')

          @section('title', 'Customer')

          @section('container')
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Customer</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <a href="/customer/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>
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
                      <th>Telp</th>
                      <th>Email</th>
                      <th>Alamat</th>
                      <th style="width: 200px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $dt)
                    <tr>
                      <td>0000{{ $dt->id }}</td>
                      <td>{{ $dt->nama }}</td>
                      <td>{{ $dt->telp }}</td>
                      <td>{{ $dt->email }}</td>
                      <td>{{ $dt->alamat }}</td>
                      <td>
                        <a href="customer/{{ $dt->id }}/edit" class="btn btn-dark btn-sm">Edit</a>
                        <form action="customer/{{ $dt->id }}" method="post" class="d-inline">
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
