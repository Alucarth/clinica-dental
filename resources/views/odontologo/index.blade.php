@extends('layouts.adminlte')


@section('content')
<div class="container">


    <div class="row">

        <br><br>

        <div class="col-md-10 col-md-offset-1">


          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">odontologos</h3>
              <div class="box-tools pull-right">
                <!-- Buttons, labels, and many other things can be placed here! -->
                <!-- Here is a label for example -->
                {{-- <span class="label label-primary">Label</span> --}}
                 <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#odontologoModal" ><span class="ion ion-medkit fa-lg"></span></a>
              </div><!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">


               <table id="lista" class="table table-hover table-bordered dt-responsive nowrap" >

                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Especialidad</th>
                                <th>Celulares</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach ($odontologos as $odontologo)

                            <tr>

                                <td>{{$odontologo->nombre}}</td>
                                <td>{{$odontologo->especialidad}}</td>
                                <td>{{$odontologo->celular}}</td>
                                <td>
                                  <a class="btn btn-primary btn-sm" href="#"> <i class="ion ion-edit fa-lg"></i> </a>
                                  <a class="btn btn-danger btn-sm" href="#"> <i class="ion ion-trash-b fa-lg"></i> </a>
                                {{-- <a class="btn btn-info btn-sm " href="{{url('odontologo/historial/'.$odontologo->id)}}"> <span class="glyphicon glyphicon-file" aria-hidden="true"></span> --}}
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

<div class="modal fade" id="odontologoModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"> Registro de Odontologo</h4>
      </div>
      <form action="{{url('odontologos')}}" method="post">
        {{ csrf_field() }}
          <div class="modal-body">

              <div class="row">
                  <div class="form-group col-md-12">
                    <label for="nombre_paciente">Nombres</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="nombre_paciente">Especialidad</label>
                    <input type="text" class="form-control" name="especialidad" placeholder="Especialidad">
                  </div>

                  <div class="form-group col-md-6">
                    <label for="telefono">Telefono</label>
                    <input type="number" class="form-control" name="celular" placeholder="Telefono">
                  </div>
              </div>

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

