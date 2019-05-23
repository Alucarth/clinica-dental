 <?php  require base_path() . '/app/Libs/DavidUtil.php';

 ?>
@extends('layouts.paciente')

@section('head')


  <script src={{ asset("js/keyrushelper.js")}}></script>

@endsection



@section('content')

<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title"> Tratamientos del Paciente: {{ ucwords($paciente->nombre.' '.$paciente->apellidos)}}</h3>


    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->

    <a href="{{url('paciente/tratamientos/crear/'.$paciente->id)}}" class="btn btn-success btn-sm" ><span class="fa fa-plus-square"></span> Nuevo Tratamiento</a>

    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">

                <table id="lista" class="table" cellspacing="0" width="100%">

                    <thead>
                        <tr>
                            <th>Fecha </th>
                            <th>Diagnostico</th>
                            <th>Odontologo</th>
                            <th>Saldo</th>
                            <th>Costo del tratamiento</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($tratamientos as $tratamiento)

                          <tr>
                            <td> {{$tratamiento->created_at}}
                            <td> {{$tratamiento->diagnostico}}</td>
                            <td> {{$tratamiento->odontologo->nombre}}</td>
                            <td> {{$tratamiento->balance}} </td>
                            <td> {{$tratamiento->costo_tratamiento}}</td>
                            <td>
                            <a class="btn btn-info btn-sm " href="#" > <span class="ion ion-edit fa-lg" aria-hidden="true"></span>
                            </a>
                            </td>
                        </tr>
                    @endforeach


                      </tbody>
                </table>
</div><!-- /.box-body -->
  {{-- <div class="box-footer">

  </div><!-- box-footer --> --}}
</div><!-- /.box -->




@endsection
@section("script")
<script type="text/javascript">
  window.onload = function () {


    $('#lista').DataTable({
      responsive: true,
      columnDefs: [
      { "orderable": false, "targets": -1 }
      ],
      language: spanish_lang
    });


  };
</script>

@endsection
