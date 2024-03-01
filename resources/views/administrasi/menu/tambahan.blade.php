<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bahan baku</title>

    @extends('administrasi.navigasi')
</head>
<body>
@section('content')
<div class="page-title">
    <div class="title_left">
      <h3>Cup <small> </small></h3>
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
  <div class="col-md-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Cup<small>/ ukuran</small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
          <li>
            <!-- Button trigger modal -->
          <button type="button" class="btn btn-round btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form-input-cup">
            <i class="fa fa-plus-circle"></i> Tambah data ukuran cup
          </button>

          <!-- Modal -->
          <div class="modal fade" id="form-input-cup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data ukuran cup</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/tambahan/cup/add" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama cup<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" name="cup" required="required"/>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Ukuran cup<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 input-group">
                          <input class="form-control" name="ukuran" type="number" required="required">
                          <span class="input-group-text">.Oz</span>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Harga tambahan cup<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" name="harga_tambah_cup" type="number" required="required"/>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Bahan<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                          <select name="bahan" class="select2_single form-control"  required="required">
                            @foreach ($bahan as $items)
                              <option value="{{ $items->id }}">{{ $items->bahan_baku }}</option>
                            @endforeach
                          </select>
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
          </li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="row">
          <div class="col-sm-12">
              <div class="card-box table-responsive">
                  <table id="datatable" class="table table-striped table-bordered table-hover" style="width:100%">
                      <thead>
                          <tr>
                              <th>No</th>
                              <th>Nama cup</th>
                              <th>Ukuran</th>
                              <th>Harga</th>
                              <th>Stok bahan</th>
                              <th style="width: 128px">Aksi</th>
                          </tr>
                      </thead>


                      <tbody>
                          @foreach ($cup as $key => $items)
                              <tr>
                                  <td>{{ $key+1 }}</td>
                                  <td style="width: 525px;">{{ $items->cup }}</td>
                                  <td>{{ $items->ukuran }}.Oz</td>
                                  <td>{{ $items->harga_tambah_cup }}</td>
                                  <td>{{ $items->stok->stok }}</td>
                                  <td>
                                      <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form_change{{ $items->id }}">
                                        <i class="fa fa-edit"></i>
                                      </button>

                                      <a href="/tambahan/cup/remove/{{ $items->id }}" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin ingin menghapus?')">
                                        <i class="fa fa-trash"></i>
                                      </a>

                                      <!-- Modal -->
                                      <div class="modal fade" id="form_change{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data barang</h1>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <form action="/tambahan/cup/change/{{ $items->id }}" method="post" enctype="multipart/form-data">
                                              @csrf
                                              <div class="modal-body">
                                                  <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama cup<span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input class="form-control" name="cup" required="required" value="{{ $items->cup }}"/>
                                                    </div>
                                                  </div>
                                                  <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Ukuran<span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9 input-group">
                                                      <input class="form-control" name="ukuran" type="number" required="required" value="{{ $items->ukuran }}">
                                                      <span class="input-group-text">.Oz</span>
                                                    </div>
                                                  </div>
                                                  <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Harga tambahan cup<span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9">
                                                        <input class="form-control" name="harga_tambah_cup" required="required" value="{{ $items->harga_tambah_cup }}"/>
                                                    </div>
                                                  </div>
                                                  <div class="field item form-group">
                                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Bahan<span class="required">*</span></label>
                                                    <div class="col-md-9 col-sm-9">
                                                      <select name="bahan" class="select2_single form-control"  required="required">
                                                        @foreach ($bahan as $items)
                                                          <option value="{{ $items->id }}">{{ $items->bahan_baku }}</option>
                                                        @endforeach
                                                      </select>
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