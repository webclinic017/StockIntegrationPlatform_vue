@extends('layouts/nav')
@section('css')
<script
    src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign">
</script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>
<script src="./js/chartjs-chart-financial.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.1"></script>
<script src="https://cdn.jsdelivr.net/npm/hammerjs@2.0.8"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-zoom@0.7.4"></script>


<style>
    .myChartDiv {
        max-width: 90%;
        max-height: 400px;
    }

    #myChart {
        background-color: #eee;
    }
</style>
@endsection
@section('content')
{{-- <div style="width:1000px">
    <canvas id="chart"></canvas>
</div> --}}
<div class="myChartDiv">
    <canvas id="myChart" width="600" height="400"></canvas>
</div>


@endsection
@section('js')

<script>
    var res = {!! json_encode($data) !!};

        var data = [];
        var time = res.time;
        var close = res.close;
        var upBBand = res.upBBand;
        var midBBand = res.midBBand;
        var downBBand = res.downBBand;
        var x = [];
        time.forEach((element,index) => {
            x[index] = index;
        });
        console.log();

        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                datasets: [
                    {
                        label: '上軌',
                        data: upBBand,
                        type: 'line',
                        fill:false,
                        labels: x,
                        pointRadius: 0,

                    },
                    {
                        label: '中軌',
                        data: midBBand,
                        type: 'line',
                        labels: x,
                        fill:false,
                        pointRadius: 0,
                    },
                    {
                        label: '下軌',
                        data: downBBand,
                        type: 'line',
                        labels: x,
                        fill:false,
                        pointRadius: 0,
                    },
                    {
                        label: '收盤價',
                        data: close,
                        type: 'line',
                        fill:false,
                        pointRadius: 0,
                    }
                ],

                labels: x
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                },
                plugins: {
                    zoom: {
                        // Container for pan options
                        pan: {
                            // Boolean to enable panning
                            enabled: true,

                            // Panning directions. Remove the appropriate direction to disable
                            // Eg. 'y' would only allow panning in the y direction
                            mode: 'xy'
                        },

                        // Container for zoom options
                        zoom: {
                            // Boolean to enable zooming
                            enabled: true,

                            // Zooming directions. Remove the appropriate direction to disable
                            // Eg. 'y' would only allow zooming in the y direction
                            mode: 'xy',
                        }
                    }
                }
            }
        });





</script>
@endsection
