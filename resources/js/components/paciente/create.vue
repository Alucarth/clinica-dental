<template>
	<div>
		<div class="row">
			<div class="form-group col-md-5">
			<label for="nombre_paciente">Nombres</label>
			<input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
			</div>

			<div class="form-group col-md-5">
			<label for="nombre_paciente">Apellidos</label>
			<input type="text" class="form-control" name="apellidos" placeholder="Apellidos">
			</div>


			<div class="form-group col-md-2">
			<label for="telefono">Telefono</label>
			<input type="number" class="form-control" name="telefono" placeholder="Telefono">
			</div>
		</div>
		<div class="row">
			<div class="form-group col-md-3">
				<label for="telefono">Celular</label>
				<input type="number" class="form-control" name="celular" placeholder="celular">
				</div>
			<div class="form-group col-md-3">
				<label for="Edad">Fecha de Nacimiento </label>
				<input type="text" class="form-control" v-model="birthdate" v-mask="'##/##/####'" placeholder="dd/mm/yyyy" name="fecha_nacimiento" >
			</div>
			<div class="form-group col-md-3">
				<label for="Edad">Edad</label>
				<input type="number" class="form-control" :value='getAge(birthdate)' name="edad" placeholder="Edad" disabled>
			</div>
			<div class="form-group col-md-3">
				<label for="nombre_paciente">Email</label>
				<input type="text" class="form-control" name="email" placeholder="Correo Electronico ">
			</div>
		</div>

		<div class="row">
		<div class="form-group col-md-2">
			<label for="Sexo">Sexo</label>

			<select  class="form-control" name="sexo">
			<option value="hombre">Hombre</option>
			<option value="mujer">Mujer</option>

			</select>
		</div>
		<div class="form-group col-md-5">
			<label for="descripcion">Antecedente Enfermedades</label>
			<textarea class="form-control" rows="3" name="antecedente_enfermedad"></textarea>
		</div>

			<div class="form-group col-md-5">
			<label for="descripcion">Informacion Adicional</label>
			<textarea class="form-control" rows="3" name="informacion_adicional"></textarea>
		</div>

		</div>
		<div class="row">
			<div class="form-group  col-md-6">
				<label for="odontologo">Odontologo</label>
				<vue-multiselect 
					v-model="odontologo"
					:options="odontologos"
					id="odontologo"
					placeholder="Seleccionar Codigo" 
					select-label="Seleccionar"
					deselect-label="Remover"
					selected-label="Seleccionado"
					label="nombre"
					track-by="nombre" >

				</vue-multiselect>
			</div>
			<input type="text" :value="odontologo?odontologo.id:'' " name="odontologo_id" hidden>
		</div>
		<div class="row" v-if="getAge(birthdate) < 16">

		<div class="col-md-12"> <h5 class="text-info">DATOS DEL PADRE</h5> </div>
		<div class="form-group col-md-5">
			<label for="nombre_paciente">Nombre completo</label>
			<input type="text" class="form-control" name="father_name" placeholder="Nombre del Padre">
		</div>
		<div class="form-group col-md-5">
			<label for="nombre_paciente">Domilio</label>
			<input type="text" class="form-control" name="father_address" placeholder="Domicilio">
		</div>
		<div class="form-group col-md-2">
			<label for="telefono">Celular </label>
			<input type="number" class="form-control" name="father_phone" placeholder="celular">
		</div>

		</div>
	</div>
</template>

<script>
export default {
	props:['odontologos'],
	data:()=>({
		birthdate:null,
		odontologo:{},
	}),
	methods:{
		getAge(str_birthDate){
			if(str_birthDate){
				let [day, month, year] = str_birthDate.split("/");
				console.log('calculando ');
				if(!isNaN(day) && !isNaN(month) && !isNaN(year)){
					console.log('day;'+day);
					console.log('month;'+month);
					console.log('year;'+year);
					let today = new Date();
					let birthDate = new Date(year, month - 1, day)
					let age = today.getFullYear() - birthDate.getFullYear();
					let m = today.getMonth() - birthDate.getMonth();
					if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) 
					{
						age--;
					}
					console.log('es fecha:'+age);
					return age;
				}else{
					return 0;
				}
			
			}else{
				return 0;
			}
		}
	},
	computed:{
		age(){
			
			// return 0;
		}
	},
	created(){
		console.log('cargando componente');

	}

}
</script>
