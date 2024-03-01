<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Penjualan</title>
    @extends('administrasi.navigasi')
</head>
<body>
@section('content')
<div class="page-title">
    <div class="title_left">
      <h3>Laporan Penjualan <small></small></h3>
    </div>

    <div class="title_right">
        <div class="col-md-7 col-sm-7   form-group pull-right top_search">
          <form action="/users" method="post">
            @csrf
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Search for...">
              <span class="input-group-btn border-4">
                <button class="btn btn-default rounded-end-circle"><i class="fa fa-search"></button></i>
              </span>
            </div>
            
          </form>
        </div>
      </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
              @if ($errors->any())
                <div class="position-relative">
                  <div class="position-absolute top-0 start-50 translate-middle">
                    @foreach ($errors->all() as $errors)  
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>{{ $errors }}</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endforeach
                  </div>
                </div>
                @endif
                <h2>Laporan<small>/ penjualan</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                  <div class="col-sm-12">
                    <table id="datatable" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th style="width: 64px">No</th>
                              <th>Nama pembeli</th>
                              <th>Metode Pembayaran</th>
                              <th>Alamat pengiriman</th>
                              <th>Kontak</th>
                              <th>Tanggal jual</th>
                              <th>Total pendapatan</th>
                          </tr>
                      </thead>


                      <tbody>
                          @foreach ($laporan as $key => $laporan)
                              <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td>{{ $laporan->pembeli->nama_pembeli }}</td>
                                  <td>{{ $laporan->metode_pembayaran }}</td>
                                  <td>{{ $laporan->pembeli->alamat }}</td>
                                  <td>{{ $laporan->pembeli->nomor_kontak }}</td>
                                  <td>{{ $laporan->tanggal_jual }}</td>
                                  <td>Rp.{{ number_format($laporan->total_pendapatan) }}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <div class="text-end mx-3 mt-4">
                    <h6>
                      <strong class="mx-4">Total keuangan:</strong>Rp.{{ number_format($total_keuangan) }}
                    </h5>
                  </div>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>