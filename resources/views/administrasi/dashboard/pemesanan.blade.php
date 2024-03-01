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
      <div class="col-md-5 col-sm-5 pull-right">
        <button class="btn btn-round btn-outline-secondary position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-controls="staticBackdrop">
      @if (session('cart'))
          <span class="position-absolute top-0 start-100 translate-middle border border-light rounded-circle bg-danger p-2 badge"><i class="fa fa-bell-o"></i></span>
      @endif
          <i class="fa fa-bookmark-o"></i>
        </button>
      </div>
      <div class="col-md-7 col-sm-7   form-group pull-right top_search">
        <form action="/" method="post">
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

  {{-- Pesanan --}}
  @if (session('cart'))

  <div class="offcanvas show offcanvas-bottom text-bg-dark" style="height: 412px;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasDark" aria-labelledby="offcanvasDarkLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasDarkLabel">Pesanan</h5>
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label for="nama_pembeli" class="form-label"><span class="required">*</span> Nama pembeli:</label>
        </div>
        <div class="col-auto">
          <form action="/checkout" method="post">
            @csrf
          <input style="width: 564px;" type="text" name="nama_pembeli" class="form-control" placeholder="Masukan nama pembeli" id="nama_pembeli" required='required'>
        </div>
      </div>
      <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvasDark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDark" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">

      <table id="cart" class="table table-dark table-hover ">
        <thead>
          <tr>
            <th style="width:22%">Product</th>
            <th style="width:16%">Topping</th>
            <th style="width:16%">Cup</th>
            <th style="width:8%">Quantity</th>
            <th style="width:18%" class="text-center">Subtotal</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0 ?>
        @foreach (session('cart') as $id =>$pesanan )
          <?php $total += $pesanan['price'] * $pesanan['quantity'] ?>

          <tr>

            <td data-th="Product" class="row">
              <div class="row">
                <div class="col md-3 hidden-xs">
                  <img src="storage/{{ $pesanan['photo'] }}" width="50" height="" style="width:50px; height:50px;" class="img-fluid" />
                </div>
                <div class="col md-9">
                  <span class="nomargin align-middle">{{ $pesanan['produk'] }}</span>
                  <input type="text" name="produk_id[]" value="{{ $id }}" hidden>
                </div>
              </div>
            </td>
            <td>
              <div class="form-group row">
                <div class="col-md-9 col-sm-9 ">
                  <select class="form-control" name="topping_id[]">
                    @foreach ($toppings as $topping )
                    <option value="{{ $topping->id }}">{{ $topping->topping }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </td>
            <td>
              <div class="form-group row">
                <div class="col-md-9 col-sm-9 ">
                  <select class="form-control" name="cup_id[]">
                    @foreach ($cups as $cup )
                    <option value="{{ $cup->id }}">{{ $cup->cup }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
            </td>
            <td data-th="Quantity">
                <input type="number" name="jumlah_beli[]" value="{{ $pesanan['quantity'] }}" class="form-control quantity" />
            </td>
            <td data-th="Subtotal" class="text-center">
              <input type="number" name="harga_jual[]" value="{{ $pesanan['price'] * $pesanan['quantity'] }}" hidden>
              Rp.{{ number_format($pesanan['price'] * $pesanan['quantity']) }}
            </td>
            <td style="width: 2%;">
              <p class="remove-from-cart cart-delete" data-id="{{ $id }}" title="Delete"><i class="fa fa-times"></i></p>
            </td>


          </tr>
        @endforeach
        </tbody>
      </table>

    </div>
    <div class="offcanvas-footer d-flex justify-content-between p-4 mx-5">
      <div class="left">
        <a type="button" href="clear-cart"  onclick="return window.confirm('Apakah anda yakin ingin menghapus?')" class="btn btn-outline-secondary btn-sm" @if(session('cart')) aria-disabled="true" @endif>Bersihkan Pesanan</a>
      </div>
      <div class="right">
        @if(!empty($pesanan))
          <input type="number" name="total" value="{{ $total }}" hidden>
          <strong class="mx-3">Total harga: Rp.{{ number_format($total) }}</strong>
        @else
          Tidak ada pesanan.....
        @endif
        <a>
          <button type="submit" class="btn btn-info btn-sm">
            CheckOut
          </button>
        </a>
      </div>
    </form>

    </div>
  </div>

  @endif
  {{-- endPesanan --}}

  {{-- Topping --}}
  <div class="col-md-2">
    <div class="x_panel">
      <div class="x_title">
        <h2>Topping</h2>
        <ul class="nav navbar-right panel_toolbox">
          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
        </ul>
        <div class="clearfix"></div>
      </div>
      <div class="x_content">

        <div class="row">
          @foreach ($toppings as $items)  
          <div class="col-md-50 mb-2">
            <div class="thumbnail">
              <div class="image view-first">
                <img style="width: 100%; display: block;" src="storage/{{ $items->gambar_topping }}" alt="image" />
                <div class="mask">
                  <p>{{ $items->topping }}</p>
                  <div class="tools tools-bottom">
                  </div>
                </div>
              </div>
              <div class="caption d-flex justify-content-between">
                <div class="left">
                  <p><strong>{{ $items->topping }}</strong></p>
                  <p>Harga: Rp.<u>{{ number_format($items->harga_tambah_topping) }} </u></p>
                </div>
                <p>Stok: {{ $items->stok->stok }}</p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  {{-- Menu --}}
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
              <div class="image view-first">
                <img style="width: 100%; display: block;" src="storage/{{ $items->gambar_produk }}" alt="image" />
                <div class="mask">
                  <p>{{ $items->produk }}</p>
                  <div class="tools tools-bottom">
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
              <div class="caption d-flex justify-content-between align-items-end">
                <div class="left">
                  <p><strong>{{ $items->produk }}</strong></p>
                  <p>Harga: Rp.<u>{{ number_format($items->harga_produk) }} </u></p>
                </div>
                <div class="text-end">
                  <p>Stok: <u>{{ number_format($items->stok->stok) }} </u></p>
                  <a
                    href="{{ url('add-to-cart/'.$items->id) }}"
                    data-product-id="{{ $items->id }}"
                    id="add-cart-btn-{{ $items->id }}"
                    class="btn btn-sm btn-round btn-outline-success add-cart-btn add-to-cart-button">
                    <i class="fa fa-plus"></i>
                  </a>

                  <span
                    id="adding-cart-{{ $items->id }}"
                    class="btn btn-warning btn-block text-center added-msg"
                    style="display: none"
                    >Added.</span
                  >
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
{{-- <script type="text/javascript">
  $(document).ready(function () {
    $('.add-to-cart-button').on('click', function () {
        var productId = $(this).data('product-id');

        $.ajax({
            type: 'GET',
            url: '/add-to-cart/' + productId,
            success: function (data) {
                $("#adding-cart-" + productId).show();
                $("#add-cart-btn-" + productId).hide();
            },
            error: function (error) {
                console.error('Error adding to cart:', error);
            }
        });
    });
  });
</script> --}}

<script type="text/javascript">

  $(".remove-from-cart").click(function(e) {
      e.preventDefault();

      var ele = $(this);

      if (confirm("Are you sure want to remove product from the cart.")) {
          $.ajax({
              url: '{{ url("remove-from-cart") }}',
              method: "DELETE",
              data: {
                  _token: '{{ csrf_token() }}',
                  id: ele.attr("data-id")
              },
              success: function(response) {
                  window.location.reload();
              }
          });
      }
  });
</script>
@endsection
</body>
</html>