 <?php  require base_path() . '/app/Libs/DavidUtil.php';?>
@extends('layouts.paciente')

@section('head')

  {{-- <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.js")}}'></script>

  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js")}}'></script>
  <script src='{{ asset("bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.extensions.js")}}'></script> --}}

   {{-- <script src='{{ asset("bower_components/jsPDF/dist/jspdf.debug.js")}}'></script> --}}
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script> --}}

@endsection


@section('content')

<div class="box box-primary ">
  <div class="box-header with-border">
    <h3 class="box-title"> {{ ucwords($paciente->nombre.' '.$paciente->apellidos)}}</h3>


    <div class="box-tools pull-right">
      <!-- Buttons, labels, and many other things can be placed here! -->
      <!-- Here is a label for example -->
      <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal" data-json="{{$paciente}}"><span class="fa fa-edit"></span></a>
      <a href="#" id="imprimir" class="btn btn-success btn-sm"> <span class="fa fa-print"></span></a>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">


                   <br>
                   <label> Celular:  </label> {{$paciente->celular}}
                   <br>
                   <label> Email:  </label> {{$paciente->email}}
                   {{-- <br>
                   <label> País:  </label> {{$paciente->pais}} --}}
                   <br>
                   <label> Sexo:  </label> {{$paciente->sexo}}
                   <br>
                   <label> Fecha de Nacimiento:  </label> {{$paciente->fecha_nacimiento}}
                   <br>
                    <label> Edad:  </label> {{ $paciente->edad}}
                   <br>

                   <label> Teléfono:  </label> {{$paciente->telefono}}
                   <br>
                   <label> Antedentes de Enfermedades: </label> {{$paciente->antecedente_enfermedad}}
                   <br>
                   <label> Informacion Adicional: </label> {{$paciente->informacion_adicional}}
                   <br>



  </div><!-- /.box-body -->
  <div class="box-footer">

  </div><!-- box-footer -->
</div><!-- /.box -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Datos del Paciente</h4>
      </div>
      <form action="{{url('pacientes')}}" method="post">
        {{ csrf_field() }}
          <div class="modal-body">

                 <input type="hidden" name="paciente_id" id="paciente_id" >


              <crear-paciente :odontologos="{{$odontologos}}">

              </crear-paciente>
              {{-- <div class="form-group col-md-2">
                  <label for="Pais">Pais</label>
                  <input type="text" class="form-control" name="pais"  id="pais" placeholder="Pais">
                </div>   --}}


          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"> Cancelar <span class="glyphicon glyphicon-remove"> </span> </button>

            <button type="submit" class="btn btn-primary"> Guardar <span class="glyphicon glyphicon-floppy-disk"></span> </button>
          </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<table id="my-table"><!-- ... --></table>
@endsection
@section("script")
<script type="text/javascript">

  window.onload = function () {

    $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var paciente = button.data('json') // Extract info from data-* attributes
    console.log(paciente);
    var date = moment(paciente.fecha_nacimiento);
    console.log(date);
    var modal = $(this);
   // modal.find('.modal-title').text('Pieza Nro' + dienteId)
    modal.find('.modal-body #paciente_id').val(paciente.id)

    modal.find('.modal-body #nombre').val(paciente.nombre)
    modal.find('.modal-body #apellidos').val(paciente.apellidos).change()
    modal.find('.modal-body #telefono').val(paciente.telefono).change()
    modal.find('.modal-body #email').val(paciente.email).change()
    modal.find('.modal-body #celular').val(paciente.celular).change()
    modal.find('.modal-body #fecha_nacimiento').val(date.format('L')).change()
    modal.find('.modal-body #edad').val(paciente.edad).change()
    modal.find('.modal-body #antecedente_enfermedad').val(paciente.antecedente_enfermedad).change()
    modal.find('.modal-body #informacion_adicional').val(paciente.informacion_adicional).change()
    modal.find('.modal-body #sexo').val(paciente.sexo).change()
    modal.find('.modal-body #father_name').val(paciente.father_name).change()
    modal.find('.modal-body #father_address').val(paciente.father_address).change()
    modal.find('.modal-body #father_phone').val(paciente.father_phone).change()


  });



    $("#imprimir").click(function() {
      // alert("hola");
      let paciente = @json($paciente);
      let tabla = @json($tabla);
      // console.log(paciente);
      var doc = new jsPDF();
      doc.text(80, 20, 'Historial Clinico');
      doc.text(20, 30, 'Paciente: '+paciente.nombre +" "+paciente.apellidos);

      doc.text(20, 40, 'Correo Electronico: '+paciente.email);
      doc.text(20, 50, 'celular: '+paciente.celular);
      doc.text(20, 60, 'Fecha de Vencimiento: '+paciente.fecha_nacimiento);
      doc.text(20, 70, 'Edad : '+paciente.edad);
      doc.text(20, 80, 'Antedentes : '+paciente.antecedente_enfermedad);
      doc.text(20, 90, 'Informacion Adicional :' + paciente.informacion_adicional);
      doc.text(20, 100, 'Sexo: '+paciente.sexo );
      doc.text(15, 120, 'Tratamientos' );
      doc.autoTable({html: '#my-table'});

    // Or JavaScript:
        doc.autoTable({
            startY:122,
            head: [['Fecha', 'Diagnostico', 'Odontologo','Costo']],
            body: tabla
        });

      doc.save('histoiral.pdf');
    });
    // $('#lista').DataTable({
    //   responsive: true,
    //   columnDefs: [
    //   { "orderable": false, "targets": -1 }
    //   ]
    // });


  };
  // var paciente = <?php echo  json_encode($paciente); ?>;



  </script>

@endsection
