@extends('layouts.adminlte')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Inicio</div>

                <div class="panel-body">
                        <canvas id="myChart" width="400" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
<script>
@section("script")
// $( document ).ready(function() {
    var consulta = @json($consulta);
    console.log(consulta);
    var ctx = document.getElementById("myChart");
    var day = moment();
    console.log(day.format('MMMM'));
    var cantidades = [];
    var etiquetas = [];
    consulta.forEach(item => {
        // let d = moment().date(item.month);
        // console.log();
        day.month(item.month-1);
        etiquetas.push(day.format('MMMM'));
        cantidades.push(item.cantidad);
    });
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [{
                label: '# de Pacientes',
                // display: true,
                data: cantidades,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                ],   
                // borderColor: [
                //     'rgba(255,99,132,1)'
                // ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
// 
@endsection
</script> 