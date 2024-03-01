<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengguna</title>

    @extends('administrasi.navigasi')

</head>
<body>
    @section('content')
        <!-- page content -->
        <div class="page-title">
          <div class="title_left">
            <h3>Data Pengguna</h3>
          </div>

          <div class="title_right">
            <div class="col-md-5 col-sm-5   pull-right">

              <!-- Button trigger modal -->
              <button type="button" class="btn btn-round btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form_input">
                <i class="fa fa-plus-circle"></i> Tambah Pengguna Baru
              </button>

              <!-- Modal -->
              <div class="modal fade" id="form_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data pengguna baru</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/users/add" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="modal-body">
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                              <input class="form-control" name="name" required="required" />
                          </div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                              <input class="form-control" type="text" class='tel' name="username" required='required'/></div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Password<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                            <input class="form-control" type="password" id="password1" name="password" required='required' />
                            
                            <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                              <i id="slash" class="fa fa-eye-slash"></i>
                              <i id="eye" class="fa fa-eye"></i>
                            </span>
                          </div>
                        </div>  
                        <div class="field item form-group">
                            <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9">
                                <textarea required="required" name='address' style="width:100%;"></textarea></div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9">
                              <input class="form-control" type="tel" class='tel' name="phone" required='required' /></div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Level<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9 ">
                            <select name="level" class="select2_single form-control">
                              <option value="operator">Operator</option>
                              <option value="admin">Admin</option>
                            </select>
                          </div>
                        </div>
                        <div class="field item form-group">
                          <label class="col-form-label col-md-3 col-sm-3  label-align">Foto<span class="required">*</span></label>
                          <div class="col-md-9 col-sm-9 ">
                            <input class="form-control" name="foto" type="file" required="required">
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
            <div class="x_panel">
              <div class="x_content">
                <div class="col-md-12 col-sm-12  ">
                </div>
                
                <div class="clearfix"></div>

                @foreach ($users as $items)
                <div class="col-md-4 profile_details card m-3">
                  <div class="card-body profile_view">
                    <div class="col-sm-12">
                      <h4 class="brief"><i>{{ $items->level }}</i></h4>
                      <div class="left col-md-7 col-sm-7">
                        <h2><strong>{{ $items->name }}</strong><small> /{{ $items->username }}</small></h2>
                        <ul class="list-unstyled">
                          <li><i class="fa fa-building my-2"></i> Address: {{ $items->address }}</li>
                          <li><i class="fa fa-phone mb-3"></i> Kontak: {{ $items->phone }}</li>
                          <p class="ratings">
                            <a>4.0</a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star"></span></a>
                            <a href="#"><span class="fa fa-star-o"></span></a>
                          </p>
                        </ul>
                      </div>
                      <div class="right col-md-5 col-sm-5">
                        <img src="/storage/{{ $items->foto }}" alt="" style="width: 128px; height: 128px;" class="img-circle">
                      </div>
                    </div>
                    <div class="profile-bottom"></div>
                    <div class="card-footer">
                      <a href="/users/remove/{{ $items->id }}" onclick="return window.confirm('Apakah anda yakin ingin menghapus?')">
                        <button type="button" class="btn btn-danger mr-5"><i class="fa fa-trash"></i> Hapus akun</button>
                      </a>

                      <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form-edit{{ $items->id }}"><i class="fa fa-edit"></i> Ubah data pengguna</button>

                      <div class="modal fade" id="form-edit{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data pengguna</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form action="/users/change/{{ $items->id }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="modal-body">
                                <div class="text-center mb-4">
                                  <div class="product-image">
                                    <img src="/storage/{{ $items->foto }}" alt="..." class="img-thumbnail"/>
                                  </div>
                                </div>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">Nama<span class="required">*</span></label>
                                  <div class="col-md-9 col-sm-9">
                                      <input class="form-control" name="name" required="required" value="{{ $items->name }}" />
                                  </div>
                                </div>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">Username<span class="required">*</span></label>
                                  <div class="col-md-9 col-sm-9">
                                      <input class="form-control" type="text" class='tel' name="username" required='required' value="{{ $items->username }}"/></div>
                                </div>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">Ubah Password</label>
                                  <div class="col-md-9 col-sm-9">
                                    <input class="form-control" type="password" id="password1" name="password"/>
                                    
                                    <span style="position: absolute;right:15px;top:7px;" onclick="hideshow()" >
                                      <i id="slash" class="fa fa-eye-slash"></i>
                                      <i id="eye" class="fa fa-eye"></i>
                                    </span>
                                  </div>
                                </div>  
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Alamat<span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9">
                                        <textarea required="required" name='address' style="width:100%;">{{ $items->address }}</textarea></div>
                                </div>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">Telephone<span class="required">*</span></label>
                                  <div class="col-md-9 col-sm-9">
                                      <input class="form-control" type="tel" class='tel' name="phone" required='required' value="{{ $items->phone }}"/></div>
                                </div>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">Level<span class="required">*</span></label>
                                  <div class="col-md-9 col-sm-9 ">
                                    <select name="level" class="select2_single form-control">
                                        <option value="admin" @if($items->level=='admin') selected @endif >Admin</option>
                                        <option value="operator" @if($items->level=='operator') selected @endif >Operator</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="field item form-group">
                                  <label class="col-form-label col-md-3 col-sm-3  label-align">Ubah Foto</label>
                                  <div class="col-md-9 col-sm-9 ">
                                    <input class="form-control" name="foto" type="file" >
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <input type="submit" class="btn btn-secondary btn-round" value="Update">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
                @endforeach
                
                @if ($errors->any())
                  <div class="position-relative">
                    <div class="position-absolute top-100 start-50 translate-middle">
                      @foreach ($errors->all() as $errors)  
                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ $errors }}</strong> Harap masukan username lain.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                      @endforeach
                    </div>
                  </div>
                @endif

              </div>
            </div>
        </div>
        <!-- /page content -->
    @endsection

    
</body>
</html>