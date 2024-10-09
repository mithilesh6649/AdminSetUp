@extends('adminlte::page')

@section('title', 'Data Analysis')

@section('content_header')
@stop

@section('content')

<section class="content"> 

  <div class="row">
    <div class="col-md-6">   
        <div class="card">                     
            <div class="card-body">
                 <canvas id="canvas" style="width: 900px; height: 500px"></canvas>

            </div>
        </div>
    </div>
    <div class="col-md-6">   
        <div class="card">                     
            <div class="card-body">
                   <div id="google-line-chart" style="width: 100%; height: 425px"></div>

            </div>
        </div>
    </div>    
</div>  
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script>
    var year = <?php echo $year; ?>;
    var user = <?php echo $user; ?>;
    var barChartData = {
        labels: year,
        datasets: [{
            label: 'User',
            backgroundColor: "pink",
            data: user
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    },
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Year users joined'
                }
            }
        });
    };
</script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
 
        function drawChart() {
 
        var data = google.visualization.arrayToDataTable([
            ['Month Name', 'Monthly registered users'],
 
                @php
                foreach($lineChart as $d) {
                    echo "['".$d->month_name."', ".$d->count."],";
                }
                @endphp
        ]);
 
        var options = {
          title: 'Monthly registered users',
          curveType: 'function',
          legend: { position: 'bottom' }
        };
 
          var chart = new google.visualization.LineChart(document.getElementById('google-line-chart'));
 
          chart.draw(data, options);
        }
    </script>
@endsection
