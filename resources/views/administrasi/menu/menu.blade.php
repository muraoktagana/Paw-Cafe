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
      <h3>Menu <small>/ Produk</small></h3>
    </div>

    <div class="title_right">
      <div class="col-md-5 col-sm-5   pull-right">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-round btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form_input">
          <i class="fa fa-plus-circle"></i> Tambah Produk
        </button>

        <!-- Modal -->
        <div class="modal fade" id="form_input" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data Produk</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form action="/menu/add" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                  <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Nama produk<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9">
                        <input class="form-control" name="produk" required="required" />
                    </div>
                  </div>
                  <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Gambar produk<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 ">
                      <input class="form-control" name="gambar_produk" type="file" required="required">
                    </div>
                  </div>
                  <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Harga<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9">
                        <input class="form-control" type="number" class='tel' name="harga_produk" required='required'/></div>
                  </div>
                  <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori produk<span class="required">*</span></label>
                    <div class="col-md-9 col-sm-9 ">
                      <select name="kategori_id" class="select2_single form-control" required='required'>
                        @foreach ($kategori as $jenis_produk)
                        <option value="{{ $jenis_produk->id }}">{{ $jenis_produk->nama_kategori }}</option>
                        @endforeach
                      </select>
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
                  <div class="field item form-group">
                    <label class="col-form-label col-md-3 col-sm-3  label-align">Diskon</label>
                    <div class="col-md-9 col-sm-9 ">
                      <select name="diskon_id" class="select2_single form-control">
                        <option value="">Tidak ada diskon</option>
                        @foreach ($list_diskon as $diskon)
                        <option value="{{ $diskon->id }}">{{ $diskon->nama_diskon }}</option>
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
  <div class="col-md-2">
    <div class="x_panel">
      <div class="x_title">
        <h2>Topping</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li>
            <!-- Button trigger modal -->
          <button type="button" class="btn btn-round btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#form_input_topping">
            <i class="fa fa-plus-circle"></i>
          </button>

          <!-- Modal -->
          <div class="modal fade" id="form_input_topping" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data topping</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/tambahan/topping/add" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Topping<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" name="topping" required="required"/>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Gambar topping<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9 ">
                          <input class="form-control" name="gambar_topping" type="file" required="required">
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Harga topping<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" name="harga_tambah_topping" type="number" required="required"/>
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
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="row">
          @foreach ($topping as $items)  
          <div class="col-md-50 mb-2">
            <div class="thumbnail">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="storage/{{ $items->gambar_topping }}" alt="image" />
                <div class="mask">
                  <p>{{ $items->topping }}</p>
                  <div class="tools tools-bottom">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#form-edit-topping{{ $items->id }}">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a href="/tambahan/topping/remove/{{ $items->id }}" onclick="return window.confirm('Apakah anda yakin ingin menghapus?')"><i class="fa fa-trash"></i></a>
                  </div>
                </div>
              </div>
              <div class="caption">
                <p>Harga: Rp.<u>{{ number_format($items->harga_tambah_topping) }} </u></p>
                <p>Stok: {{ $items->stok->stok }}</p>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="form-edit-topping{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data topping</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/tambahan/topping/change/{{ $items->id }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Nama topping<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" name="topping" required="required" value="{{ $items->topping }}"/>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Gambar topping</label>
                        <div class="col-md-9 col-sm-9 ">
                          <input class="form-control" name="gambar_topping" type="file">
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Harga<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                            <input class="form-control" name="harga_tambah_topping" required="required" type="number" value="{{ $items->harga_tambah_topping }}"/>
                        </div>
                      </div>
                      <div class="field item form-group">
                        <label class="col-form-label col-md-3 col-sm-3  label-align">Bahan<span class="required">*</span></label>
                        <div class="col-md-9 col-sm-9">
                          <select name="bahan" class="select2_single form-control"  required="required">
                            <option selected value="{{ $items->stok->id }}">{{ $items->stok->bahan_baku }}</option>
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
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-10">
    @foreach ($kategori as $kategori_menu)
    <div class="x_panel">
      <div class="x_title">
        <h2>Produk<small>/ {{ $kategori_menu->nama_kategori }} </small></h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="row">
          @foreach ($kategori_menu->produk as $items)
          <div class="col-md-55">
            <div class="thumbnail ui-ribbon-container">
              <div class="image view view-first">
                <img style="width: 100%; display: block;" src="storage/{{ $items->gambar_produk }}" alt="image" />
                <div class="mask">
                  <p>{{ $items->produk }}</p>
                  <div class="tools tools-bottom">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#form-edit{{ $items->id }}">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a href="/menu/remove/{{ $items->id }}"  onclick="return window.confirm('Apakah anda yakin ingin menghapus?')"><i class="fa fa-times"></i></a>
                  </div>
                </div>
                @if ($items->diskon_id != null)  
                <div class="ui-ribbon-wrapper">
                  <div class="ui-ribbon bg-danger">
                    @if ($items->diskon->jenis_diskon=='persentase')
                    {{ number_format($items->diskon->nilai_diskon) }}% Off
                    @else
                    - {{ number_format($items->diskon->nilai_diskon) }}
                    @endif
                  </div>
                </div>
                @endif
              </div>
              <div class="caption">
                <p><strong>{{ $items->produk }}</strong></p>
                <div class=" d-flex justify-content-between align-items-end">
                  <p>Harga: Rp.<u>{{ number_format($items->harga_produk) }} </u></p>
                  <p>Stok: <u>{{ number_format($items->stok->stok) }} </u></p>
                </div>
              </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="form-edit{{ $items->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">Masukan data produk</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="/menu/change/{{ $items->id }}" method="post" enctype="multipart/form-data">
                  @csrf
                  <div class="modal-body">
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Nama produk<span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9">
                          <input class="form-control" name="produk" required="required" value="{{ $items->produk }}"/>
                      </div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Gambar produk</label>
                      <div class="col-md-9 col-sm-9 ">
                        <input class="form-control" name="gambar_produk" type="file">
                      </div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Harga<span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9">
                          <input class="form-control" type="number" class='tel' name="harga_produk" required='required' value="{{ $items->harga_produk }}"/></div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Kategori produk<span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9 ">
                        <select name="kategori_id" class="select2_single form-control" required='required'>
                          <option value="{{ $items->kategori->id }}">{{ $items->kategori->nama_kategori }}</option>
                          @foreach ($kategori as $jenis_produk)
                          <option value="{{ $jenis_produk->id }}">{{ $jenis_produk->nama_kategori }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Bahan<span class="required">*</span></label>
                      <div class="col-md-9 col-sm-9">
                        <select name="bahan" class="select2_single form-control"  required="required">
                          <option selected value="{{ $items->stok->id }}">{{ $items->stok->bahan_baku }}</option>
                          @foreach ($bahan as $stok_produk)
                          <option value="{{ $stok_produk->id }}">{{ $stok_produk->bahan_baku }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="field item form-group">
                      <label class="col-form-label col-md-3 col-sm-3  label-align">Diskon</label>
                      <div class="col-md-9 col-sm-9 ">
                        <select name="diskon_id" class="select2_single form-control">
                          {{-- @if ($items->diskon_id == null) --}}
                          @if ($items->diskon_id != null)
                          <option selected class="bg-primary" value="{{ $items->diskon->id }}">{{ $items->diskon->nama_diskon }}</option>
                          @endif
                          <option value="">Tidak ada diskon</option>
                          @foreach ($list_diskon as $diskon)
                          <option value="{{ $diskon->id }}">{{ $diskon->nama_diskon }}</option>
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
          </div>
          @endforeach
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
</body>
</html>