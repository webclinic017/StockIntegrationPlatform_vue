@extends('layouts/nav')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
{{-- <link rel="stylesheet" href="{{asset("../css/basic_info.css")}}"> --}}
<script
src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>
{{-- <script src="./js/chartjs-chart-financial.js" type="text/javascript"></script> --}}

<style>
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


    <!-- tab-all -->



    <main id="content">

        {{-- 回測 --}}
        <div id="analysis-content">
            <div class="container">


                {{-- 布林通道曲線 --}}
                <div class="myChartDiv p-5">
                    <h2 class="text-center pt-3">布林通道曲線</h2>
                    <canvas id="Chart_bband" width="600" height="400"></canvas>
                </div>

                {{-- 成交量 --}}
                <div class="myChartDiv mt-5">
                    <canvas id="Chart_volume"></canvas>
                </div>


                <h2 class="text-center pt-3">回測績效</h2>
                <div id="win" class="d-flex">
                </div>


                {{-- 累積報酬 --}}
                <div class="myChartDiv">
                    <h2 class="text-center pt-3">累積報酬</h2>
                    <canvas id="Chart2_tradecum" width="600" height="400"></canvas>
                </div>
            </div>
        </div>



    </main>




</section>

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

{{-- <script src="{{ asset('js/historical-stock.js') }}" ></script> --}}
<script src="{{ asset('js/chartjs-chart-financial.js') }}" ></script>

{{--回測  --}}
<script>
    var win = document.querySelector('#win');
    var res = {!! json_encode($data_backtest) !!};
    console.log(res);
    // win.innerHTML +=
    //                 `
    //                 <span>勝率:${res[1].winRate}</span>
    //                 <span>平均每筆收益:${res[1].meanWin}</span>
    //                 <span>平均每筆損失:${res[1].meanLoss}</span>
    //                 `;

    win.innerHTML +=
                    `
    <table class="table text-center">
  <thead>
    <tr>
      <th scope="col">勝率</th>
      <th scope="col">敗率</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">${res[1].winRate}%</th>
      <td>${res[1].loseRate}%</td>
    </tr>
  </tbody>

  <thead>
    <tr>
      <th scope="col">平均每筆收益</th>
      <th scope="col">平均每筆損失</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">${res[1].meanWin}</th>
      <td>${res[1].meanLoss}</td>
    </tr>
  </tbody>
</table>
                    `;


    res[3].forEach((element,index) => {
        newDate = luxon.DateTime.fromRFC2822(element.t)
        res[3][index].t = newDate.valueOf()
    });
    // console.log(res[3]);
    var ctx = document.getElementById('Chart_bband').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 450;

    var Chart_bband = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [
                {
                    label: 'K線圖',
                    data: res[3],
                    type: 'candlestick',
                },
                {
                    label: '上軌',
                    data: res[0].upBBand,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'blue',

                },
                {
                    label: '中軌',
                    data: res[0].midBBand,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'yellow',
                },
                {
                    label: '下軌',
                    data: res[0].downBBand,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'blue',
                },
            ],
            labels:res[0].labeltime,
        },

    });

// 成交量
    var ctx = document.getElementById('Chart_volume').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {

            datasets: [
                {
                    label: '成交量',
                    data: res[0].volume,
                    fill:false,
                    pointRadius: 0,
                    backgroundColor:'rgba(30,144,255, 0.7)',
                },
            ],
            labels: res[0].labeltime,

        },


    });


// 成交量結束




    var ctx = document.getElementById('Chart2_tradecum').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var Chart2_tradecum = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [
                {
                    label: 'tradecum',
                    data: res[2].tradecum,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'blue',

                },
                {
                    label: 'notradecum',
                    data: res[2].notradecum,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'black',
                },
            ],
            labels:res[0].labeltime,
        },


    });

</script>





@endsection
