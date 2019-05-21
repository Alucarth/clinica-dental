<template>
<div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="nombre_paciente">Nombre</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo">
            </div>

            <div class="form-group col-md-6">
                <label for="direccion">Direccion</label>
                <input type="text" class="form-control" name="direccion" placeholder="Direccion">
            </div>
            <div class="form-group col-md-6">
                <label for="nombre_paciente">Trabajo</label>
                <input type="text" class="form-control" name="trabajo" placeholder="Trabajo">
            </div>
            <div class="form-group col-md-6">
                <label for="nombre_paciente">Prueba</label>
                <input type="text" class="form-control" name="prueba" placeholder="prueba">
            </div>
            <div class="form-group col-md-6">
                <label for="nombre_paciente">Finalizacion</label>
                <input type="text" class="form-control" name="finalizacion" placeholder="finalizacion">
            </div>
            <div class="form-group col-md-6">
                <label for="nombre_paciente">A C</label>
                <input type="text" class="form-control" name="A_C" placeholder="A_C">
            </div>

            <div class="form-group col-md-6">
                <label for="telefono">Saldo</label>
                <input type="number" class="form-control" name="saldo" placeholder="Saldo">
            </div>

            <div class="form-group col-md-6">
                <label for="nombre_paciente">Responsable</label>
                <input type="text" class="form-control" name="responsable" placeholder="responsable">
            </div>

            <div class="form-group col-md-6">
                <label for="nombre_paciente">Fecha</label>
                <input type="text" class="form-control" name="fecha" placeholder="fecha">
            </div>

            <div class="form-group col-md-6">
                <label for="nombre_paciente">Hora</label>
                <input type="text" class="form-control" name="hora" placeholder="hora">
            </div>

            <div class="form-group  col-md-6">
				<label for="odontologo">Paciente</label>
				<vue-multiselect
					v-model="paciente"
					:options="pacientes"
					id="paciente"
					placeholder="Seleccionar paciente"
					select-label="Seleccionar"
					deselect-label="Remover"
					selected-label="Seleccionado"
					label="nombre"
					track-by="nombre" >

				</vue-multiselect>
			</div>
			<input type="text" :value="paciente?paciente.id:'' " name="paciente_id" hidden>

        </div>
</div>
</template>
<script>
export default {
    props: ['pacientes'],
    data:()=>({
		paciente:{},
	}),
}
</script>
