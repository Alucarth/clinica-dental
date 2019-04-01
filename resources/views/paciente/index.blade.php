@extends('layouts.adminlte')


@section('content')
<div class="container">


    <div class="row">

        <br><br>

        <div class="col-md-10 col-md-offset-1">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Pacientes</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                {{-- <span class="label label-primary">Label</span> --}}
                 <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" ><span class="fa fa-user-plus"></span></a>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">


               <table id="lista" class="table table-hover table-bordered dt-responsive nowrap" >

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Celulares</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($pacientes as $paciente)

                            <tr>

                                <td>{{$paciente->nombre}}</td>
                                <td>{{$paciente->celular}}</td>
                                <td>
                                <a class="btn btn-info btn-sm " href="{{url('paciente/historial/'.$paciente->id)}}"> <i class="ion ion-android-document fa-lg  "></i> </span>
                                </a>
                                <a class="btn btn-primary btn-sm " href="#"> <i class="ion ion-android-create fa-lg "></i></a>
                                <a class="btn btn-danger btn-sm " href="#"> <i class="ion ion-android-delete fa-lg "></i></a>


                                </td>
                            </tr>
                        @endforeach


                          </tbody>
                    </table>

            </div><!-- /.box-body -->
            {{-- <div class="box-footer"> --}}
              {{-- The footer of the box --}}
            {{-- </div>box-footer --}}
          </div><!-- /.box -->



        </div>
    </div>
</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> Registro de Paciente</h4>
      </div>
      <form action="{{url('pacientes')}}" method="post">
        {{ csrf_field() }}
          <div class="modal-body">

              

              <crear-paciente :odontologos="{{$odontologos}}" >
                  
              </crear-paciente>



          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar <i class="glyphicon glyphicon-remove"> </i> </button>

            <button type="submit" class="btn btn-primary"> Guardar <i class="fa fa-save"></i> </button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
@section('script')
<script type="text/javascript">


</script>
@endsection
