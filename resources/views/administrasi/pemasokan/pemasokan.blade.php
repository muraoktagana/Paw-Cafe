<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pemasokan - pemasokan</title>
    @extends('administrasi.navigasi')
</head>
<body>
    @section('content')
    <div class="page-title">
        <div class="title_left">
          <h3>Pemasokan <small></small></h3>
        </div>

        <div class="title_right">
            <div class="col-md-5 col-sm-5   pull-right">

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-round btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form_input">
                <i class="fa fa-plus-circle"></i> Tambah Pasokan
              </button>

              <!-- Modal -->
              <div class="modal fade" id="form_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data pasokan</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/pemasokan/add" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Bahan baku<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9 ">
                            <select name="bahan_baku" class="select2_single form-control"  required="required">
                              @foreach ($pasokan as $pasokan)
                                <option value="{{ $pasokan->id }}">{{ $pasokan->bahan_baku }}</option>
                              @endforeach
                            </select>
                          </div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Harga pembelian<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                              <input class="form-control" name="harga_pasokan" type="number" required="required" />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Satuan<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                              <input class="form-control" name="satuan" required="required" />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah beli<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                              <input class="form-control" type="number" name="jumlah_beli" required="required" />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                              <input class="form-control" class='date' type="datetime-local" name="tanggal_pemasokan" required='required'></div>
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
              <form action="/pemasokan" method="post">
                @csrf
                <div class="input-group">
                  <input type="text" class="form-control" name="search" placeholder="Search for...">
                  <span class="input-group-btn border-  4">
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
                    <h2>Data<small>/ pemasokan</small></h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Bahan baku</th>
                                            <th>Harga pasokan</th>
                                            <th>Harga total</th>
                                            <th>Jumlah beli</th>
                                            <th>Satuan</th>
                                            <th>Waktu Pembelian</th>
                                            <th style="width: 128px">Aksi</th>
                                        </tr>
                                    </thead>
                                    

                                    <tbody>
                                        @foreach ($pemasokan as $key => $items)
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $items->stok->bahan_baku }}</td>
                                                <td>{{ number_format($items->harga_pasokan) }}</td>
                                                <td>{{ number_format($items->harga_pasokan * $items->jumlah_beli) }}</td>
                                                <td>{{ $items->jumlah_beli }}</td>
                                                <td>{{ $items->satuan }}</td>
                                                <td>{{ $items->pemasokan->tanggal_pemasokan }}</td>
                                                <td>
                                                  <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form-edit{{ $items->pemasokan_id }}">
                                                    <i class="fa fa-edit"></i>
                                                  </button>
                                                  <!-- Modal -->
                                                  <div class="modal fade" id="form-edit{{ $items->pemasokan_id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                          <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data pasokan</h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          <form action="/pemasokan/change/{{ $items->id }}" method="post" enctype="multipart/form-data">
                                                          @csrf
                                                          <div class="modal-body">
                                                              <div class="field item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3  label-align">Bahan baku<span class="required">*</span></label>
                                                                <div class="col-md-9 col-sm-9">
                                                                  <select name="bahan_baku" class="select2_single form-control"  required="required">
                                                                    <option selected value="{{ $items->stok->id }}">{{ $items->stok->bahan_baku }}</option>
                                                                  </select>
                                                                </div>
                                                              </div>
                                                              <div class="field item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3  label-align">Harga pasokan<span class="required">*</span></label>
                                                                <div class="col-md-9 col-sm-9">
                                                                    <input class="form-control" name="harga_pasokan" required="required" value="{{ $items->harga_pasokan }}"/>
                                                                </div>
                                                              </div>
                                                              <div class="field item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3  label-align">Satuan<span class="required">*</span></label>
                                                                <div class="col-md-9 col-sm-9">
                                                                    <input class="form-control" name="satuan" required="required" value="{{ $items->satuan }}"/>
                                                                </div>
                                                              </div>
                                                              <div class="field item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3  label-align">Jumlah beli<span class="required">*</span></label>
                                                                <div class="col-md-9 col-sm-9">
                                                                    <input class="form-control" name="jumlah_beli" required="required" value="{{ $items->jumlah_beli }}"/>
                                                                </div>
                                                              </div>
                                                              <div class="field item form-group">
                                                                <label class="col-form-label col-md-3 col-sm-3  label-align">Date<span class="required">*</span></label>
                                                                <div class="col-md-9 col-sm-9">
                                                                    <input class="form-control" class='date' type="datetime-local" name="tanggal_pemasokan" required='required' value="{{ $items->pemasokan->tanggal_pemasokan }}"></div>
                                                              </div>
                                                          </div>
                                                          <div class="modal-footer">
                                                              <input type="submit" class="btn btn-secondary btn-round" value="Ubah">
                                                          </div>
                                                          </form>
                                                      </div>
                                                      </div>
                                                  </div>

                                                  <a href="/pemasokan/remove/{{ $items->pemasokan->id }}" class="btn btn-danger" onclick="return window.confirm('Apakah anda yakin ingin menghapus?')">
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
</div>
    @endsection
</body>
</html>