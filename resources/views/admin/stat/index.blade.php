@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.stat.actions.index'))

@section('body')

    <div class="row">
        <canvas id="myChart" width="460px" height="460px"></canvas>
    </div>



@endsection
@section('chartin')
    <script type="application/javascript" src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    <script>
        const contexto2 = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(contexto2, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chart->labels)!!},
                datasets: [
                    {
                        label: 'Estadisticas',
                        backgroundColor: {!! json_encode($chart->colours)!!} ,
                        data:  {!! json_encode($chart->dataset)!!} ,
                    },
                ]
            },
            options: {
                responsive: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <?php
    session_start();
    if (isset($_SESSION['quantity'])) {
        $_SESSION['quantity'] = $_SESSION['quantity'] + 1;
    } else {
        $_SESSION['quantity'] = 1;
    }
    $x = $_SESSION['quantity'];
    ?>
@endsection

