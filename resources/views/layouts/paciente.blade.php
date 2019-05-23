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

      //  echo '<h1>hola</h1>';
    }
   // $keyrus = new DavidHelper();
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
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Santa </b> Cecilia</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->
          <?php NavLink("pacientes","pacientes"); ?>
          <!-- User Account: style can be found in dropdown.less -->
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

        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
          <div class="pull-left image">
            <img src='https://avataaars.io/?avatarStyle=Transparent&topType=LongHairBigHair&accessoriesType=Round&hairColor=BlondeGolden&facialHairType=Blank&clotheType=CollarSweater&clotheColor=Gray01&eyeType=Close&eyebrowType=RaisedExcitedNatural&mouthType=Tongue&skinColor=Pale' class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{$paciente->nombre.' '.$paciente->apellidos}}</p>
            <a href="#">Paciente </a>
          </div>
        </div>

        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Menu del Paciente</li>
           <li>
            <a href="{{url('paciente/historial/'.$paciente->id)}}">
              <i class="fa  fa-file"></i> <span>Historial Clinico</span>

            </a>
          </li>

           <li>
            <a href="{{url('paciente/tratamientos/'.$paciente->id)}}">
              <i class="fa fa-plus-square"></i> <span>Tratamientos</span>

            </a>
          </li>


           <li>
            <a href="{{url('paciente/odontograma/'.$paciente->id)}}">
              <i class="fa fa-calendar-o"></i> <span>Odontograma</span>

            </a>
          </li>

           <li>
            <a href="{{url('paciente/anamnesis/'.$paciente->id)}}">
              <i class="fa fa-calendar-plus-o"></i> <span>Anamnesis</span>

            </a>
          </li>

           {{-- <li>
            <a href="{{url('paciente/pagos/'.$paciente->id)}}">
              <i class="fa fa-money"></i> <span>Pagos</span>

            </a>
          </li> --}}


        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

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
        <li class="active">Dashboard</li>
      </ol> --}}
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
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
        <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">Spectral Code</a>.</strong>
    reserved.
  </footer>


  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<script>


	</script>
@yield("script")
</body>
</html>
