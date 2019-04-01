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
      
      <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal" ><span class="fa fa-plus-square"></span> Nuevo Tratamiento</a>

    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
  				  
                <table id="lista" class="table" cellspacing="0" width="100%">

                    <thead>
                        <tr> 
                            <th> Id </th>
                            <th>Fecha </th>
                            <th>Nro de Pieza</th>
                            <th>Descripción</th>
                            
                            <th>Odontologo</th>
                            <th>Saldo</th>
                            <th>Costo del tratamiento</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach ($tratamientos as $tratamiento)
              
                          <tr>
                            <td> {{$tratamiento->id }}</td>
                            <td> {{$tratamiento->created_at}}
                            <td> {{Diente::where('id',$tratamiento->id_diente)->first()->nro_pieza }} </td>
                            <td> {{$tratamiento->descripcion}}</td>
                            
                            <td> {{Odontologo::where('id',$tratamiento->id_odontologo)->first()->nombre}} </td>
                            <td> {{$tratamiento->balance}} </td>
                            <td> {{$tratamiento->costo_tratamiento}}</td>
                            <td>
                            <a class="btn btn-info btn-sm " href="#" data-toggle="modal" data-target="#myModal"   data-id_tratamiento="{{$tratamiento->id}}" data-id_diente="{{$tratamiento->id_diente}}" data-costo_tratamiento="{{$tratamiento->costo_tratamiento}}" data-descripcion="{{$tratamiento->descripcion}}"> <span class="fa fa-edit" aria-hidden="true"></span>
                            </a>
            

                                
                            </td>
                        </tr>
                    @endforeach
                      
                      
                      </tbody>
                </table>
</div><!-- /.box-body -->
  <div class="box-footer">
   
  </div><!-- box-footer -->
</div><!-- /.box -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Tratamiento</h4>
      </div>
      <form action="{{url('tratamientos')}}" method="post"> 
        {{ csrf_field() }}
          <div class="modal-body">
            
                <input type="hidden" name="id_paciente" id="id_paciente" value="{{$paciente->id}}" >
                <input type="hidden" name="id_tratamiento" id="id_tratamiento"  >
                <div class="form-group">
                  <label for="Sexo">Numero de Pieza Dental</label>

                  <select  class="form-control" name="id_diente" id="id_diente">
                  {{-- @foreach( Diente::where('id_paciente',$paciente->id)->get() as $diente )
                     <option value="{{$diente->id}}">{{$diente->nro_pieza}}</option>

                  @endforeach --}}
                 
                    
                   
                  
                </select>

              <div class="form-group">
                <label for="nombre_paciente">Descripcion </label>
                
                <textarea class="form-control" rows="3" name="descripcion" id="descripcion"></textarea>
              </div>

            
             
              <div class="form-group">
                <label for="telefono">Costo del Tratamiento </label>
                <input type="number" class="form-control" name="costo_tratamiento" id="costo_tratamiento" placeholder="0">
              </div>

              

                
 
          
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar <span class="glyphicon glyphicon-remove"> </span> </button>

            <button type="submit" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></span> </button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@endsection
@section("script")
<script type="text/javascript">
  window.onload = function () {

      
    $('#lista').DataTable({
      responsive: true,
      columnDefs: [
      { "orderable": false, "targets": -1 }
      ]
    });


  };
</script>

@endsection
