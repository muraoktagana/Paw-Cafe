<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemasokan - stok</title>
    @extends('administrasi.navigasi')
</head>
<body>
    @section('content')
    <div class="page-title">
        <div class="title_left">
          <h3>Stok Barang <small></small></h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5   pull-right">

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-round btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form_input">
                <i class="fa fa-plus-circle"></i> Tambah data barang
              </button>

              <!-- Modal -->
              <div class="modal fade" id="form_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data barang</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/stok/add" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                          <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Nama Barang<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" name="bahan_baku" required="required"/>
                            </div>
                          </div>
                          <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Stok</label>
                            <div class="col-md-9 col-sm-9">
                                <input class="form-control" name="stok" type="number" value="0"/>
                            </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <input type="submit" class="btn btn-secondary btn-round" value="Tambah">
                      </div>
                      </form>
                  </div>
                </div>
              </div>

            </div>
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
                    <h2>Stok<small>/ barang</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <div class="row">
                      <div class="col-sm-12">
                        <table id="datatable" class="table table-striped table-bordered table-hover" style="width:100%">
                          <thead>
                              <tr>
                                  <th style="width: 64px">No</th>
                                  <th>Bahan baku</th>
                                  <th>Stok</th>
                                  <th style="width: 128px">Aksi</th>
                              </tr>
                          </thead>
  
  
                          <tbody>
                              @foreach ($barang as $key => $barang)
                                  <tr>
                                      <td>{{ $key+1 }}</td>
                                      <td style="width: 525px;">{{ $barang->bahan_baku }}</td>
                                      <td>{{ $barang->stok }}</td>
                                      <td>
                                          <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form_change{{ $barang->id }}">
                                            <i class="fa fa-edit"></i>
                                          </button>
                                          <!-- Modal -->
                                          <div class="modal fade" id="form_change{{ $barang->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                              <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data barang</h1>
                                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <form action="/stok/change/{{ $barang->id }}" method="post" enctype="multipart/form-data">
                                                  @csrf
                                                  <div class="modal-body">
                                                      <div class="field item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Bahan baku<span class="required">*</span></label>
                                                        <div class="col-md-9 col-sm-9">
                                                            <input class="form-control" name="bahan_baku" required="required" value="{{ $barang->bahan_baku }}"/>
                                                        </div>
                                                      </div>
                                                      <div class="field item form-group">
                                                        <label class="col-form-label col-md-3 col-sm-3  label-align">Stok<span class="required">*</span></label>
                                                        <div class="col-md-9 col-sm-9">
                                                            <input class="form-control" name="stok" required="required" value="{{ $barang->stok }}"/>
                                                        </div>
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <input type="submit" class="btn btn-secondary btn-round" value="Ubah">
                                                  </div>
                                                  </form>
                                              </div>
                                              </div>
                                          </div>
  
                                          <a href="/stok/remove/{{ $barang->id }}" class="btn btn-danger"  onclick="return window.confirm('Apakah anda yakin ingin menghapus?')">
                                              <i class="fa fa-trash"></i>
                                          </a>
                                      </td>
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

</div>
    @endsection
</body>
</html>