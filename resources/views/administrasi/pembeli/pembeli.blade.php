<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pembeli</title>
    @extends('administrasi.navigasi')
</head>
<body>
@section('content')
<div class="page-title">
    <div class="title_left">
      <h3>Pelanggan <small></small></h3>
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
                <h2>Daftar<small>/ pelanggan</small></h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="row">
                  <div class="col-sm-12">
                    <table id="datatable" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th style="width: 64px">No</th>
                              <th>Nama pelanggan</th>
                              <th>Alamat</th>
                              <th>Kontak</th>
                          </tr>
                      </thead>


                      <tbody>
                          @foreach ($pembeli as $key => $pembeli)
                              <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td style="width: 525px;">{{ $pembeli->nama_pembeli }}</td>
                                  <td>{{ $pembeli->alamat }}</td>
                                  <td>{{ $pembeli->nomor_kontak }}</td>
                              </tr>
                          @endforeach

                      </tbody>
                  </table>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
</html>