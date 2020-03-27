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
<script src="./js/chartjs-chart-financial.js" type="text/javascript"></script>

<style>
    .myChartDiv {
        max-width: 90%;
        max-height: 400px;
        padding: 100px 0;
    }

    .bckg{
        background-color: #eee;
    }


</style>
@endsection



@section('content')
<section class="container">


    <!-- tab-all -->



    <main id="content">
            {{-- 財務分析 --}}
            {{-- 1.財務結構 --}}
        <div id="historical-stock-content">
              {{-- 負債佔資產比率(%) --}}
            <div class="myChartDiv">
                <h2 class="text-center pb-2">1.財務結構</h2>
                <h2 class="text-center pb-2">負債佔資產比率(%)</h2>
                <canvas id="Debtratio" class="bckg"></canvas>
            </div>


            {{-- 長期資金佔不動產、廠房及設備比率(%) --}}
            <div class="myChartDiv">
                <h2 class="text-center pb-2">長期資金佔不動產、廠房及設備比率(%)</h2>
                <canvas id="Longterm" class="bckg"></canvas>
            </div>

        </div>


            {{-- 2.償債能力 --}}
        <div id="historical-stock-content">
              {{-- 流動比率(%) --}}
            <div class="myChartDiv">
                <h2 class="text-center pb-2">2.償債能力</h2>
                <h2 class="text-center pb-2">流動比率(%)</h2>
                <canvas id="Currentratio" class="bckg"></canvas>
            </div>
               {{-- 速動比率(%) --}}
            <div class="myChartDiv">
                <h2 class="text-center pb-2">速動比率(%)</h2>
                <canvas id="Quickratio" class="bckg"></canvas>
            </div>


            {{-- 利息保障倍數(%) --}}
            <div class="myChartDiv">
                <h2 class="text-center pb-2">利息保障倍數(%)</h2>
                <canvas id="ICR" class="bckg"></canvas>
            </div>


        </div>

           {{-- 3.經營能力 --}}
    <div id="historical-stock-content">
            {{-- 應收款項週轉率(次) --}}
          <div class="myChartDiv">
              <h2 class="text-center pb-2">3.經營能力</h2>
              <h2 class="text-center pb-2">應收款項週轉率(次)</h2>
              <canvas id="BRTR" class="bckg"></canvas>
          </div>

         {{-- 平均收現日數 --}}
          <div class="myChartDiv">
              <h2 class="text-center pb-2">平均收現日數</h2>
              <canvas id="BACD" class="bckg"></canvas>
          </div>

          {{-- 存貨週轉率(次) --}}
          <div class="myChartDiv">
            <h2 class="text-center pb-2">存貨週轉率(次)</h2>
            <canvas id="BITR" class="bckg"></canvas>
        </div>

        {{-- 平均銷貨日數 --}}
          <div class="myChartDiv">
            <h2 class="text-center pb-2">平均銷貨日數</h2>
            <canvas id="BASD" class="bckg"></canvas>
        </div>

        {{-- 不動產、廠房及設備週轉率(次) --}}
        <div class="myChartDiv">
            <h2 class="text-center pb-2">不動產、廠房及設備週轉率(次)</h2>
            <canvas id="BTRR" class="bckg"></canvas>
        </div>


        {{-- 總資產週轉率(次) --}}
        <div class="myChartDiv">
            <h2 class="text-center pb-2">總資產週轉率(次)</h2>
            <canvas id="BTROTA" class="bckg"></canvas>
        </div>


      </div>


            {{-- 4.獲利能力 --}}
      <div id="historical-stock-content">
                {{-- 資產報酬率(%) --}}
              <div class="myChartDiv">
                  <h2 class="text-center pb-2">4.獲利能力</h2>
                  <h2 class="text-center pb-2">資產報酬率(%)</h2>
                  <canvas id="BROA" class="bckg"></canvas>
              </div>


              {{-- 權益報酬率(%) --}}
              <div class="myChartDiv">
                  <h2 class="text-center pb-2">權益報酬率(%)</h2>
                  <canvas id="BROE" class="bckg"></canvas>
              </div>

              {{-- 稅前純益佔實收資本比率(%) --}}
              <div class="myChartDiv">
                <h2 class="text-center pb-2">稅前純益佔實收資本比率(%)</h2>
                <canvas id="BNPBF" class="bckg"></canvas>
            </div>

              {{-- 純益率(%) --}}
              <div class="myChartDiv">
                <h2 class="text-center pb-2">純益率(%)</h2>
                <canvas id="BNPM" class="bckg"></canvas>
            </div>

              {{-- 每股盈餘(元) --}}
              <div class="myChartDiv">
                <h2 class="text-center pb-2">每股盈餘(元)</h2>
                <canvas id="BEPS" class="bckg"></canvas>
            </div>
        </div>

            {{-- 5.現金流量 --}}
        <div id="historical-stock-content">
                {{-- 現金流量比率(%) --}}
              <div class="myChartDiv">
                  <h2 class="text-center pb-2">5.現金流量</h2>
                  <h2 class="text-center pb-2">現金流量比率(%)</h2>
                  <canvas id="BCFA" class="bckg"></canvas>
              </div>


              {{-- 現金流量允當比率(%) --}}
              <div class="myChartDiv">
                  <h2 class="text-center pb-2">現金流量允當比率(%)</h2>
                  <canvas id="BCFAR" class="bckg"></canvas>
              </div>

              {{-- 現金再投資比率(%) --}}
              <div class="myChartDiv">
                <h2 class="text-center pb-2">現金再投資比率(%)</h2>
                <canvas id="BCRR" class="bckg"></canvas>
            </div>


        </div>


    </main>




</section>

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>



<script>
    var res = {!! json_encode($data_backtest) !!};

    console.log(res);

    var ctx = document.getElementById('Debtratio').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

//   負債佔資產比率(%)
    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [
                {
                    label: '負債比率(%)',
                    data: res[0].debtratio,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'red',

                },
                // {
                //     label: '長期資金佔不動產、廠房及設備比率(%)',
                //     data: res[0].Long_term_to_fixedassets,
                //     fill:false,
                //     pointRadius: 0,
                //     borderColor:'green',
                // },

            ],

            // 註解時間
            labels: res[0].time,

        },


    });





    //長期資金佔不動產、廠房及設備比率(%)
    var ctx = document.getElementById('Longterm').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {

            datasets: [

                {
                    label: '長期資金佔不動產、廠房及設備比率(%)',
                    data: res[0].Long_term_to_fixedassets,
                    fill:false,
                    pointRadius: 0,
                    backgroundColor:'rgba(30,144,255, 0.7)',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });



//   2.償債能力
    //流動比率(%)
    var ctx = document.getElementById('Currentratio').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '流動比率(%)',
                    data: res[1].currentratio,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


    //速動比率(%)
    var ctx = document.getElementById('Quickratio').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '速動比率(%)',
                    data: res[1].quickratio,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


    //利息保障倍數(%)
    var ctx = document.getElementById('ICR').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '利息保障倍數(%)',
                    data: res[1].interestcoverageratio,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


//  3.經營能力
// 應收款項週轉率(次)
var ctx = document.getElementById('BRTR').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '應收款項週轉率(次)',
                    data: res[2].RTR,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });




    // 平均收現日數
var ctx = document.getElementById('BACD').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '平均收現日數',
                    data: res[2].ACD,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


//存貨週轉率(次)
var ctx = document.getElementById('BITR').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '存貨週轉率(次)',
                    data: res[2].ITR,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });

//平均銷貨日數
var ctx = document.getElementById('BASD').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '平均銷貨日數',
                    data: res[2].ASD,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


//不動產、廠房及設備週轉率(次)
var ctx = document.getElementById('BTRR').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '不動產、廠房及設備週轉率(次)',
                    data: res[2].TRR,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


//總資產週轉率(次)
var ctx = document.getElementById('BTROTA').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '總資產週轉率(次)',
                    data: res[2].TROTA,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


    // 4.獲利能力
   //資產報酬率(%)
    var ctx = document.getElementById('BROA').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '資產報酬率(%)',
                    data: res[3].ROA,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });



   //權益報酬率(%)
   var ctx = document.getElementById('BROE').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '權益報酬率(%)',
                    data: res[3].ROE,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },
    });


   //稅前純益佔實收資本比率(%)
   var ctx = document.getElementById('BNPBF').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '稅前純益佔實收資本比率(%)',
                    data: res[3].NPBF,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });

   //純益率(%)
   var ctx = document.getElementById('BNPM').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '純益率(%)',
                    data: res[3].NPM,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


   //每股盈餘(元)
   var ctx = document.getElementById('BEPS').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '每股盈餘(元)',
                    data: res[3].EPS,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });

    // 5.現金流量
   //現金流量比率(%)
   var ctx = document.getElementById('BCFA').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '現金流量比率(%)',
                    data: res[4].CFA,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });

   //現金流量允當比率(%)
   var ctx = document.getElementById('BCFAR').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '現金流量允當比率(%)',
                    data: res[4].CFAR,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


   // 現金再投資比率(%)
   var ctx = document.getElementById('BCRR').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'line',
        data: {

            datasets: [

                {
                    label: '現金再投資比率(%)',
                    data: res[4].CFAR,
                    fill:false,
                    pointRadius: 0,
                    borderColor:'green',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });


</script>
@endsection
