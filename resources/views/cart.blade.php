          @extends('template/main')

          @section('title', 'Penjualan')

          @section('container')
          <!-- Page Heading -->
          <!-- <h1 class="h3 mb-2 text-gray-800">Produk</h1> -->
          <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">

              <h6 class="m-0 font-weight-bold text-primary">Keranjang Belanja</h6>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post" action="/penjualan">
                  @csrf
                  <div class="row">
                    <div class="col-md-2">
                      <label>ID</label>
                      <input name="" class="form-control" value="<?php echo date('dmyhis') ?>" readonly>
                    </div>                  
                    <div class="col-md-6">
                      <label>Pilih Produk</label>
                      <select class="custom-select" name="produk">
                        @foreach($prod as $d)
                        <option value="{{ $d->id }}">{{ $d->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-md-2">
                      <label>Qty</label>
                      <input name="qty" class="form-control">
                    </div>
                    <div class="col-md-2">
                      <label>Action</label><br>
                      <input type="submit" class="btn btn-danger" value="Tambah">
                    </div>
                  </div><hr style="height: 1px; background-color: black;">
                </form>
                <table class="table table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th style="width: 140px;">Kode Produk</th>
                      <th>Nama Produk</th>
                      <th>Harga</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                      <th style="width: 100px;">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($data as $dt)
                    <tr>
                      <td>0000{{ $dt->id }}</td>
                      <td>{{ $dt->nama }}</td>
                      <td style="width: 150px;">Rp. <?= number_format($dt->harga) ?>,-</td>
                      <td style="width: 10px" align="center">{{ $dt->qty }}</td>
                      <td style="width: 170px;">Rp. <?= number_format($dt->sub) ?>,-</td>
                      <td>
                        <form action="{{ $dt->id }}" method="post" class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                      </td>
                    </tr>
                    @endforeach

                  </tbody>
                </table>
                <div class="alert alert-info " role="alert">
                <div class="row">
                  <div class="col-8">
                    <p style="font-size: 22px; font-weight: bold" class="mt-3"> Total Harga : Rp. <?= number_format($price) ?>,-</p>
                  </div>
                    <div class="col-4">
                      <button class="btn btn-dark mt-3" data-toggle="modal" data-target="#exampleModalLong">Simpan Transaksi</button>
                    </div>
                </div>
                </div>
              </div>
            </div>
        <!-- /.container-fluid -->
<!-- Button trigger modal -->

<!-- Modal -->
            <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document" style="width: 40%">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Selesaikan Transaksi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <form method="post" action="/penjualan/cekout">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">No. Transaksi</label>
                      <input class="form-control" value="<?= date('dmyhis') ?>" name="id" readonly>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Customer</label>
                      <select class="custom-select" name="customer">
                        @foreach($cust as $c)
                        <option value="{{ $c->id }}">{{ $c->nama }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Transaksi</label>
                      <input readonly class="form-control" name="tgl" value="<?= date('d F Y') ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Total Harga</label>
                      <input type="text" class="form-control" name="harga" readonly="" value="{{ $price }}">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Bayar</label>
                      <input type="number" class="form-control" name="jumlah" autofocus="">
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                  </form>                  
                </div>
              </div>
            </div>
        @endsection