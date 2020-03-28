@extends('layouts/nav')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<script src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>

{{-- <script src="{{ asset('js/historical-stock.js') }}" ></script> --}}
<script src="{{ asset('js/chartjs-chart-financial.js') }}" ></script>

<style>
    .container{
        height: 100vh;
    }
    .myChartDiv {
        max-width: 90%;
        max-height: 400px;
        padding: 100px 0;
    }

    #Chart_bband {
        background-color: #eee;
    }

     /* 成交量 */
    #Chart_volume {
        background-color: #eee;
    }
    /* span {
        padding: 0 5px;
    } */
</style>


@endsection



@section('content')

<section class="container">
    <div id="content">
        <div id="main">
            <div class="row main_title">
                <div class="col-12">
                    <div class="Cube">
                        <span>
                            歷史交易資料&emsp;{{$id}}
                        </span>
                    </div>
                </div>
            </div>
            {{-- 歷史股價 --}}
            <div class="row area">
                <div class="col-12">
                    <div class="area_title">
                        <div class="Cube">
                            <span>K線圖</span>
                        </div>
                    </div>
                    <canvas id="Chart_bband"></canvas>
                </div>
            </div>

            {{-- 歷史股量 --}}
            <div class="row area">
                <div class="col-12">
                    <div class="area_title">
                        <div class="Cube">
                            <span>成交量圖</span>
                        </div>
                    </div>
                    <canvas id="Chart_volume"></canvas>
                </div>
            </div>
        </div>
    </div>

</section>

@endsection

@section('js')


{{--歷史成交價  --}}
<script>
    var res = {!! json_encode($data_backtest) !!};

    console.log("res");
    console.log(res[0].shortmean);

    console.log(res);

    res[1].forEach((element,index) => {
        newDate = luxon.DateTime.fromRFC2822(element.t)
        res[1][index].t = newDate.valueOf()
    });

    console.log(res[1]);


    var ctx = document.getElementById('Chart_bband').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [
                {
                    label: '蠟燭圖',
                    data: res[1],
                    type: 'candlestick',
                },
                {
                    label: '5天平均線',
                    data: res[0].shortmean,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'red',

                },
                {
                    label: '20天平均線',
                    data: res[0].midmean,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
                {
                    label: '60天平均線',
                    data: res[0].longmean,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'black',
                },
            ],
            // labels: res[2],
            labels: res[0].labeltime,

        },


    });


</script>
{{-- 歷史成交價結束 --}}


{{--歷史成交量  --}}
<script>
    var rss = {!! json_encode($data_backtest) !!};

     console.log(rss[0].shortmean);

    console.log(rss);

    rss[1].forEach((element,index) => {
        newDate = luxon.DateTime.fromRFC2822(element.t)
        rss[1][index].t = newDate.valueOf()
    });

    console.log(rss[1]);


    var ctx = document.getElementById('Chart_volume').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {

            datasets: [
                {
                    label: '成交量',
                    data: rss[3].volume,
                    fill:false,
                    pointRadius: 0,
                    backgroundColor:'rgba(30,144,255, 0.7)',
                },
            ],
            labels: rss[0].labeltime,

        },


    });

</script>
{{-- 歷史成交量結束 --}}


@endsection
