<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin_dashboard</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}">
    <script src="{{ asset('bootstrap-5.3.2-dist/js/bootstrap.bundle.js') }}"></script>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Dropzone.js -->
    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">

    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">

    {{-- Ajax --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">

</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                      <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
                    </div>
            
                    <div class="clearfix"></div>
            
                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                      <div class="profile_pic">
                        <img src="/images/img.jpg" alt="..." class="img-circle profile_img">
                      </div>
                      <div class="profile_info">
                        <span>Welcome,</span>
                        <h2>John Doe</h2>
                      </div>
                    </div>
                    <!-- /menu profile quick info -->
            
                    <br />
            
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                      <div class="menu_section">
                        <h3>General</h3>
                        <ul class="nav side-menu">
                          
                          @if (Auth::user()->level=='admin')  

                          <li><a href="/"><i class="fa fa-pencil-square-o"></i> Pesanan</a></li>

                          <li><a><i class="fa fa-coffee"></i>Menu produk <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="/menu">Menu</a></li>
                              <li><a href="/tambahan">Cup</a></li>
                              <li><a href="/kategori">Kategori produk</a></li>
                            </ul>
                          </li>

                          <li><a href="/diskon"><i class="fa fa-tags"></i> Diskon</a></li>

                          <li><a><i class="fa fa-cubes"></i> Pasokan / Stok<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li><a href="/stok">Stok barang</a></li>
                              <li><a href="/pemasokan">Pemasokan</a></li>
                            </ul>
                          </li>

                          <li><a href="/pembeli"><i class="fa fa-users"></i>Daftar Pelanggan</a></li>

                          <li><a href="/pengiriman"><i class="fa fa-send-o"></i>Pengiriman</a></li>

                          <li><a href="/laporan-penjualan"><i class="fa fa-book"></i>Laporan Penjualan</a></li>

                          <li><a href="/users"><i class="fa fa-user"></i>Daftar Pengguna</a></li>

                          @endif

                          @if (Auth::user()->level=='operator')

                          <li><a href="/"><i class="fa fa-pencil-square-o"></i> Pesanan</a></li>

                          <li><a href="/pembeli"><i class="fa fa-users"></i>Daftar Pelanggan</a></li>

                          <li><a href="/pengiriman"><i class="fa fa-send-o"></i>Pengiriman</a></li>
                          
                          <li><a href="/laporan-penjualan"><i class="fa fa-book"></i>Laporan Penjualan</a></li>

                          @endif

                        </ul>
                      </div>
            
                    </div>
                    <!-- /sidebar menu -->
            
                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                      <a data-toggle="tooltip" data-placement="top" title="Logout" href="/logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                      </a>
                    </div>
                    <!-- /menu footer buttons -->
                  </div>
                </div>
            
                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav class="nav navbar-nav">
                        <ul class=" navbar-right">  
                          <li class="nav-item dropdown open" style="padding-left: 15px;">
                            <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                              <img src="/images/img.jpg" alt="">John Doex
                            </a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item"  href="javascript:;"> Profile</a>
                                <a class="dropdown-item"  href="javascript:;">
                                  <span class="badge bg-red pull-right">50%</span>
                                  <span>Settings</span>
                                </a>
                              <a class="dropdown-item"  href="javascript:;">Help</a>
                              <a class="dropdown-item"  href="/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                          </li>
            
                          <li role="presentation" class="nav-item dropdown open">
                            @if (session('cart'))
                              
                            <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-bell-o"></i>
                              <span class="badge bg-danger">!</span>
                            </a>
                            <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                              @foreach (session('cart') as $id =>$pesanan)

                              <li class="nav-item">
                                <a class="dropdown-item">
                                  <span class="image"><img src="storage/{{ $pesanan['photo'] }}" style="width:32px; height:32px;" /></span>
                                  <span>
                                    <span>{{ $pesanan['produk'] }}</span>
                                    <span class="time">3 mins ago</span>
                                  </span>
                                  <span class="message">
                                    Jumlah pesan: {{ $pesanan['quantity'] }}
                                  </span>
                                </a>
                              </li>

                              @endforeach
                              <li class="nav-item">
                                <div class="text-center">
                                  <a class="dropdown-item" href="/">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                  </a>
                                </div>
                              </li>
                            </ul>

                            @endif
                          </li>
                        </ul>
                      </nav>
                    </div>
                  </div>
                <!-- /top navigation -->
                
                <div class="right_col" role="main">
                  <div class="">
                    @yield('content')
                  </div>
                </div>
                
                </div>
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<!-- FastClick -->
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="../vendors/nprogress/nprogress.js"></script>
<!-- Dropzone.js -->
<script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

<!-- Datatables -->
<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="../vendors/jszip/dist/jszip.min.js"></script>
<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>



<!-- Custom Theme Scripts -->
<script src="../build/js/custom.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="../vendors/validator/multifield.js"></script>
<script src="../vendors/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>


</body>
</html>