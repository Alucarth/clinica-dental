<?php

     require base_path() . '/app/Libs/DavidHelper.php';
    function NavLink($ruta,$texto,$titulo=null)
    {
        $david = new DavidHelper();
        if($titulo)
        {
             echo $david->NavLink2($ruta,$texto,$titulo);
        }else
        {
         echo $david->NavLink($ruta,$texto);
        }

    }

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> --}}
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminlte.css') }}" rel="stylesheet">

</head>

<body class="hold-transition skin-blue layout-top-nav">
  <!-- Site wrapper -->
  <div class="wrapper">

    <header class="main-header">
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>C</b>SC</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Clinica Dental</b> Santa Cecilia</span>
      </a>
      <nav class="navbar navbar-static-top">

        <div class="container">
          <div class="navbar-header">
            <a href="../../index2.html" class="navbar-brand"> Clinica Dental Santa Cecilia</a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
            <ul class="nav navbar-nav">
              {{-- <li class="active"><a href="#">Pacientes <span class="sr-only">(current)</span></a></li>
              <li><a href="#">Citas</a></li> --}}


            </ul>

          </div>
          <!-- /.navbar-collapse -->
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <?php NavLink("home","Inicio"); ?>
              <?php NavLink("pacientes","pacientes"); ?>
              <?php NavLink("citas","citas"); ?>
              <?php NavLink("odontologos","odontologos"); ?>
              <?php NavLink("laboratorios","laboratios"); ?>
              <!-- Messages: style can be found in dropdown.less-->

              <!-- /.messages-menu -->

              <!-- Notifications Menu -->

              <!-- Tasks Menu -->

              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <img src='https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairDreads01&accessoriesType=Round&hairColor=Auburn&facialHairType=BeardLight&facialHairColor=BrownDark&clotheType=BlazerShirt&eyeType=Default&eyebrowType=UpDown&mouthType=Twinkle&skinColor=Light' class="user-image" alt="User Image">
                    <span class="hidden-xs">  {{ Auth::user()->name }} </span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                      <img src='https://avataaars.io/?avatarStyle=Transparent&topType=ShortHairDreads01&accessoriesType=Round&hairColor=Auburn&facialHairType=BeardLight&facialHairColor=BrownDark&clotheType=BlazerShirt&eyeType=Default&eyebrowType=UpDown&mouthType=Twinkle&skinColor=Light' class="img-circle" alt="User Image">

                      <p>
                          {{ Auth::user()->name." " }}
                        <small>{{ Auth::user()->email }} </small>
                      </p>
                    </li>
                    <!-- Menu Body -->

                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="#" class="btn btn-default btn-flat">perfil</a>
                      </div>
                      <div class="pull-right">
                          <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                              {{ csrf_field() }}
                              <button type="submit" class="btn btn-default" >Salir</button>
                          </form>

                      </div>
                    </li>

                  </ul>
                </li>
                <a href="{{url('odontologos')}}"> <span class="fa fa-users" aria-hidden="true"> </span> </a>
              </li>


              </li>
            </ul>
          </div>
          <!-- /.navbar-custom-menu -->
        </div>
        <!-- /.container-fluid -->
      </nav>
    </header>

    <!-- =============================================== -->


    <!-- =============================================== -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          @yield('titulo')
          <small>@yield('subtitulo')</small>
        </h1>
        {{-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Examples</a></li>
          <li class="active">Blank page</li>
        </ol> --}}
      </section>

      <!-- Main content -->
      <section class="content">
        <div id="app">
          @yield('content')
        </div>


      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b>Version</b> 2.3.6
      </div>
      <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Consulotior Dental </a>.</strong>
    </footer>

    <!-- Control Sidebar -->

    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
    {{-- <div class="control-sidebar-bg"></div> --}}
  </div>
  <!-- ./wrapper -->

  <!-- Button trigger modal -->



  <script>
    window.onload = function () {
        // console.log(spanish_lang);

        $('#lista').DataTable({
          responsive: true,
          columnDefs: [
            { "orderable": false, "targets": -1 }
          ],
          language: spanish_lang
        });
        @yield('script');

    };

  </script>

</body>

</html>
