          @extends('template/main')

          @section('title', 'Penjualan')

          @section('container')
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Penjualan</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <a href="/penjualan/create" class="btn btn-success btn-sm mb-3">Tambah Data</a>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Kode</th>
                      <th>Nama Customer</th>
                      <th>Tanggal Transaksi</th>
                      <th>Total Harga</th>
                      <th style="width: 200px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $dt)
                    <tr>
                      <td>{{ $dt->ids }}</td>
                      <td>{{ $dt->nama }}</td>
                      <td><?php echo date('d M Y H:i:s', strtotime($dt->tgl)) ?></td>
                      <td>Rp. <?php echo number_format($dt->total) ?>,-</td>
                      <td>
                        <a href="/penjualan/{{ $dt->ids }}" target="_blank" class="btn btn-dark btn-sm">Lihat Struk</a>
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
