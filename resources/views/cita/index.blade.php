@extends('layouts.adminlte')

@section('content')

<div class="box box-primary">
  <div class="box-header with-border">
   
   
  </div><!-- /.box-header -->
  <div class="box-body">
    {{-- {{$citas}} --}}
   

    <div id='calendar'></div>
  </div><!-- /.box-body -->
  <div class="box-footer">

  </div><!-- box-footer -->
</div><!-- /.box -->

<form action="{{url('citas')}}" method="post"> 
  {{ csrf_field() }}
<editar-cita  :citas="{{$citas}}" :pacientes="{{$pacientes}}" :odontologos="{{$odontologos}}"></editar-cita>
</form>  

@endsection
