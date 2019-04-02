<template>
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title"> Nuevo Tratamiento</h3>

		</div><!-- /.box-header -->
		<div class="box-body">
			<div class="row">
				<div class="form-group  col-md-6">
				<label for="odontologo">Odontologo</label>
				<vue-multiselect 
					v-model="odontologo"
					:options="odontologos"
					id="odontologo"
					placeholder="Seleccionar Odontologo" 
					select-label="Seleccionar"
					deselect-label="Remover"
					selected-label="Seleccionado"
					label="nombre"
					track-by="nombre" >

				</vue-multiselect>
				<input type="text" name="odontologo_id" :value="odontologo.id" v-if="odontologo">
			</div>
			</div>
			<legend class="text-primary">Odontopediatria</legend>
			<div class="row">
				<div class="form-group col-md-4">
					<label for="diente_id">Numero de Pieza Dental</label>
					<vue-multiselect 
						v-model="diente"
						:options="dientes"
						id="diente"
						placeholder="Seleccionar diente" 
						select-label="Seleccionar"
						deselect-label="Remover"
						selected-label="Seleccionado"
						:multiple="true"
						label="nro_pieza"
						track-by="nro_pieza" >

					</vue-multiselect>
					<input type="text" name="dientes" :value="JSON.stringify(diente)">
				</div>
				<div class="form-group col-md-4">
					<label for="anestesia">Anestesia</label>
					<select class="form-control" name="anestesia" id="anestesia">
						<option value="primera">primera</option>
						<option value="segunda">segunda</option>
						<option value="tercera">tercera</option>
					</select>
				</div>
				<div class="form-group col-md-2">
					<label for="telefono">Costo del Tratamiento </label>
					<input type="text" class="form-control" name="costo_tratamiento" id="costo_tratamiento" placeholder="0">
				</div>
				<div class="form-group col-md-2">
							<input type="checkbox" name="colaborador" v-model="colaborador" hidden>
						<label >
							Colaborador: 
						 </label>
						 	{{colaborador?'Si':'No'}}
						 	<br><switches v-model="colaborador" theme="bootstrap" color="primary" ></switches>
							 
					</div>
			</div>
			<legend class="text-primary">Cirugia</legend>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="exodoncia">Exodoncia</label>
					<select class="form-control" name="exodoncia" id="exodoncia">
						<option value="cirugia de terceros">cirugia de terceros</option>
						<option value="caninos retenidos">caninos retenidos</option>
						<option value="apisectomia">apisectomia</option>
						<option value="otros">otros</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label for="descripcion_cirugia">Descripcion </label>
					<input type="text" class="form-control" name="descripcion_cirugia">
				</div>
			</div>
			<legend class="text-primary">Ortodoncia</legend>
			<div class="row">
				<div class="form-group col-md-3">
					<label for="fecha_ortodoncia">Fecha </label>
					<input type="text" class="form-control" name="fecha_ortodoncia">
				</div>
				<div class="form-group col-md-4">
					<label for="higiene_dental">Higiene Dental</label>
					<input type="text" class="form-control" name="higiene_dental">
				</div>
				<div class="form-group col-md-5">
					<label for="descripcion_ortodoncia">Descripcion </label>
					<input type="text" class="form-control" name="descripcion_ortodoncia">
				</div>
			</div>
			<legend class="text-primary">Implantes</legend>
			<div class="row">
				<div class="form-group col-md-6">
					<label for="diagnostico">Diagnostico </label>
					<input type="text" class="form-control" name="diagnostico">
				</div>
				<div class="form-group col-md-6">
					<label for="planificacion">Planificacion</label>
					<input type="text" class="form-control" name="planificacion">
				</div>
				<div class="form-group col-md-3">
					<label for="fecha_cirugia">Fecha </label>
					<input type="text" class="form-control" name="fecha_cirugia">
				</div>
				<div class="form-group col-md-3">
					<label for="hora">Hora </label>
					<input type="text" class="form-control" name="hora">
				</div>
			</div>
			<legend class="text-primary">Rehabilitacion</legend>
			<div class="row">
				<div class="form-group col-md-4">
					<input type="checkbox" name="impresiones_preliminares" v-model="impresiones_preliminares" hidden>
					<label >
						Impresiones Preliminares: 
					</label>
					{{impresiones_preliminares?'Si':'No'}}
					<br><switches v-model="impresiones_preliminares" theme="bootstrap" color="primary" ></switches>
				</div>
				<div class="form-group col-md-4">
					<input type="checkbox" name="impresiones_trabajo" v-model="impresiones_trabajo" hidden>
					<label >
						Impresiones Trabajo:
					</label>
					{{impresiones_trabajo?'Si':'No'}}
					<br><switches v-model="impresiones_trabajo" theme="bootstrap" color="primary" ></switches>
				</div>
				<div class="form-group col-md-4">
					<input type="checkbox" name="prueba_metal" v-model="prueba_metal" hidden>
					<label >
						Prueba de Metal:
					</label>
					{{prueba_metal?'Si':'No'}}
					<br><switches v-model="prueba_metal" theme="bootstrap" color="primary" ></switches>
				</div>
			</div>
			<div v-if="impresiones_trabajo&&impresiones_trabajo&&prueba_metal" >
				<legend class="text-primary">Endodoncia</legend>
				<div class="row">
					<div class="form-group col-md-4">
						<label for="radiografia">Radiografia</label>
						<select class="form-control" name="radiografia" id="radiografia">
							<option value="uniradiculares">uniradiculares</option>
							<option value="biradiculares">biradiculares</option>
							<option value="multiradiculares">multiradiculares</option>
						</select>
					</div>
					<div class="form-group col-md-5">
						<label for="descripcion_endodoncia">Descripcion </label>
						<input type="text" class="form-control" name="descripcion_endodoncia">
					</div>
				</div>	
			</div>


		</div><!-- /.box-body -->
		<div class="box-footer">
			<div class="pull-right">
				<button class="btn btn-default">Cancelar</button>
				<button class="btn btn-success">Guardar</button>
			</div>
		</div><!-- box-footer -->
	</div><!-- /.box -->
</template>
<script>
import Switches from 'vue-switches';
export default {
	props:['dientes','odontologos'],
	data:()=>({
		odontologo:null,
		diente:null,
		colaborador:false,
		impresiones_preliminares:false,
		impresiones_trabajo:false,
		prueba_metal:false
	}),
	components: {
        Switches
    }

}
</script>

