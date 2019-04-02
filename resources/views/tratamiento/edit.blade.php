@extends('layouts.paciente')


@section('content')
<form action="{{url('tratamientos')}}" method="post">
		{{ csrf_field() }}
		<input type="text" name="paciente_id" value="{{$paciente->id}}" hidden>
		<editar-tratamiento :dientes="{{$dientes}}" :odontologos="{{$odontologos}}"></editar-tratamiento>
</form>

@endsection
@section("script")
<script type="text/javascript">
 window.onload = function () {

 };
</script>
@endsection
