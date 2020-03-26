@extends('layouts/nav')
@section('css')
<script src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>
<script src="./js/chartjs-chart-financial.js" type="text/javascript"></script>


<style>
    .myChartDiv {
        max-width: 90%;
        max-height: 400px;
        padding: 100px 0;
    }

    #Chart {
        background-color: #eee;
    }
    span {
        padding: 0 5px;
    }
</style>
@endsection
@section('content')

<div class="container">
    <div id="win" class="d-flex">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <div class="myChartDiv">
        <canvas id="Chart" width="600" height="400"></canvas>
    </div>

    <div class="myChartDiv">
        <canvas id="Chart2" width="600" height="400"></canvas>
    </div>
</div>


@endsection
@section('js')

<script>
    var win = document.querySelector('#win');
    var res = {!! json_encode($data) !!};
    console.log(res);
    win.innerHTML +=
                    `
                    <span>勝率:${res[1].winRate}</span>
                    <span>平均每筆收益:${res[1].meanWin}</span>
                    <span>平均每筆損失:${res[1].meanLoss}</span>
                    `;

    res[3].forEach((element,index) => {
        newDate = luxon.DateTime.fromRFC2822(element.t)
        res[3][index].t = newDate.valueOf()
    });
    console.log(res[3]);
    var ctx = document.getElementById('Chart').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [
                {
                    label: '蠟燭圖',
                    data: res[3],
                    type: 'candlestick',
                },
                {
                    label: '上軌',
                    data: res[0].upBBand,
                    fill:false,
                    pointRadius: 0,

                },
                {
                    label: '中軌',
                    data: res[0].midBBand,
                    fill:false,
                    pointRadius: 0,
                },
                {
                    label: '下軌',
                    data: res[0].downBBand,
                    fill:false,
                    pointRadius: 0,
                },
            ],
            labels: res[4],
        },


    });

    var ctx = document.getElementById('Chart2').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [
                {
                    label: 'tradecum',
                    data: res[2].tradecum,
                    fill:false,
                    pointRadius: 0,

                },
                {
                    label: 'notradecum',
                    data: res[2].notradecum,
                    fill:false,
                    pointRadius: 0,
                },
            ],
            labels: res[4],
        },


    });






</script>
@endsection
