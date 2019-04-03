<template>
<div id="fullCalModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span> <span
                        class="sr-only">close</span></button>
                <h4 class="modal-title">{{title}}</h4>
            </div>
            <div id="modalBody" class="modal-body">
				<input type="text" name="cita_id" :value="form.id" v-if="form.id" hidden>
				<div class="form-group">
                	<label>Paciente </label>
					<vue-multiselect
						v-model="form.paciente"
						:options="pacientes"
						:custom-label="customTemplate"
						placeholder="Seleccione Paciente"
						select-label="Seleccionar"
						deselect-label="Remover"
						selected-label="Seleccionado"
						label="nombre"
						track-by="nombre"
					>
					</vue-multiselect>
					<input type="text" name="paciente_id" :value="form.paciente?form.paciente.id:''" v-if="form.paciente" hidden>
				</div>
				<div class="form-group ">
					<label for="odontologo">Odontologo</label>
					<vue-multiselect 
						v-model="form.odontologo"
						:options="odontologos"
						id="odontologo"
						placeholder="Seleccionar Odontologo" 
						select-label="Seleccionar"
						deselect-label="Remover"
						selected-label="Seleccionado"
						label="nombre"
						track-by="nombre" >
					</vue-multiselect>
					<input type="text" name="odontologo_id" :value="form.odontologo?form.odontologo.id:''" v-if="form.odontologo" hidden>
				</div>
				<div class="form-group">
					<label>Asunto </label>
					<input type="text" class="form-control" name="descripcion" id="descripcion" v-model="form.descripcion">
				</div>
                
				<div class="row">
					
					<div class="form-group col-md-6">
						<label>Fecha</label>
						<input type="text" name="fecha" :value="form.fecha" hidden >
				
						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control" :value="form.fecha" disabled>
							
						</div>
						<!-- /.input group -->
					</div>
					<div class="form-group col-md-3">
						<label>Hora inicio</label>

						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-clock-o"></i>
							</div>
							<input type="text" class="form-control" name="hora_inicio" v-mask="'##:##'" v-model="form.hora_inicio" placeholder="00:00">

						</div>
						<!-- /.input group -->
					</div>
					<div class="form-group col-md-3">
						<label>Hora fin</label>

						<div class="input-group">
							<div class="input-group-addon">
								<i class="fa fa-clock-o"></i>
							</div>
							<input type="text" class="form-control" name="hora_fin" v-mask="'##:##'" v-model="form.hora_fin" placeholder="00:00">

						</div>
						<!-- /.input group -->
					</div>
					
				</div>

             
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-primary" type="submit"> Guardar</button>
            </div>
        </div>
    </div>
</div>
</template>
<script>
export default {
	props:['citas','pacientes','odontologos'],
	data:()=>({
		events:[],
		form:{},
		title:''
	}),
	computed:{
		// title(){
		// 	let title = "Nueva Cita";
		// 	if(this.form!={}){
		// 		title = "Editar Cita";
		// 	}
		// 	return title;
		// }
	},
	methods: {
		customTemplate(item){
			return `${item.nombre} ${item.apellidos}`;
		}
	},
	mounted(){
		// console.log(this.pacientes);
		this.citas.forEach(cita => {
			// console.log(item)
			this.events.push({
				id: cita.id,
				title: cita.paciente.nombre+':' +cita.descripcion ,
				start: cita.fecha +' '+cita.hora_inicio,
				end: cita.fecha +' '+cita.hora_fin,
			});
		});


		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			//Random default events
			events: this.events,
			editable: true,
			droppable: false,

			dayClick: (date, jsEvent, view) =>{
				this.title ="Nueva cita"
				this.form = {fecha:date.format()}
				// console.log(date.format());
				
				$('#fullCalModal').modal();


			},

			eventClick: (event) => {
				console.log(event);
				this.title ="Editar cita"
				let cita = _.find(this.citas, function(o) { return o.id == event.id; });
				this.form = cita;
				console.log(cita);
				$('#fullCalModal').modal();
			},
			eventDrop: (info)=> {
				console.log(info);
				// alert(info.event.title + " was dropped on " + info.event.start.toISOString());

				// if (!confirm("Are you sure about this change?")) {
				// info.revert();
				// }
			}
		

		});
	}

}
</script>
