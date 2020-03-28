@extends('layouts/nav')

@section('css')
<script src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>

@endsection

@section('content')
<section class="container">
    <div id="content">
        <div class="tab-content" id="v-pills-tabContent">
            {{-- 1.財務結構****************************************************************************************************** --}}
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div id="content">
                    <div id="main">
                        <div class="row">
                            <div class="col-12 main_title">
                                <div class="Cube">
                                    <span>
                                        財務結構&emsp;{{$id}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- 1.財務結構 --}}
                        <div class="row area">
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>負債佔資產比率</span>
                                </div>
                                <canvas id="Debtratio" class="bckg"></canvas>
                            </div>
                            {{-- 期資金佔不動產、廠房及設備比率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>長期資金佔不動產、廠房及設備比率(%)</span>
                                </div>
                                <canvas id="Longterm" class="bckg"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 2.償債能力****************************************************************************************************** --}}
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div id="content">
                    <div id="main">
                        <div class="row">
                            <div class="col-12 main_title">
                                <div class="Cube">
                                    <span>
                                        償債能力&emsp;{{$id}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- 1.財務結構 --}}
                        <div class="row area">
                            {{-- 流動比率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>流動比率(%)</span>
                                </div>
                                <canvas id="Currentratio" class="bckg"></canvas>
                            </div>
                            {{-- 速動比率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>速動比率(%)</span>
                                </div>
                                <canvas id="Quickratio" class="bckg"></canvas>
                            </div>
                            {{-- 利息保障倍數(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span> 利息保障倍數(%)</span>
                                </div>
                                <canvas id="ICR" class="bckg"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 3.經營能力****************************************************************************************************** --}}
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                <div id="content">
                    <div id="main">
                        <div class="row">
                            <div class="col-12 main_title">
                                <div class="Cube">
                                    <span>
                                        經營能力&emsp;{{$id}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row area">
                            {{-- 應收款項週轉率(次)(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>應收款項週轉率(次)</span>
                                </div>
                                <canvas id="BRTR" class="bckg"></canvas>
                            </div>
                            {{-- 平均收現日數(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>平均收現日數(%)</span>
                                </div>
                                <canvas id="BACD" class="bckg"></canvas>
                            </div>
                            {{-- 存貨週轉率(次)--}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>存貨週轉率(次)</span>
                                </div>
                                <canvas id="BITR" class="bckg"></canvas>
                            </div>
                            {{-- 平均銷貨日數(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>平均銷貨日數</span>
                                </div>
                                <canvas id="BASD" class="bckg"></canvas>
                            </div>
                            {{-- 不動產、廠房及設備週轉率(次) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>不動產、廠房及設備週轉率(次)</span>
                                </div>
                                <canvas id="BTRR" class="bckg"></canvas>
                            </div>
                            {{-- 總資產週轉率(次) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>總資產週轉率(次)</span>
                                </div>
                                <canvas id="BTROTA" class="bckg"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 4.獲利能力****************************************************************************************************** --}}
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div id="content">
                    <div id="main">
                        <div class="row">
                            <div class="col-12 main_title">
                                <div class="Cube">
                                    <span>
                                        獲利能力&emsp;{{$id}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- 1.財務結構 --}}
                        <div class="row area">
                            {{-- 資產報酬率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>資產報酬率(%)</span>
                                </div>
                                <canvas id="BROA" class="bckg"></canvas>
                            </div>
                            {{-- 權益報酬率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>權益報酬率(%)</span>
                                </div>
                                <canvas id="BROE" class="bckg"></canvas>
                            </div>
                            {{-- 稅前純益佔實收資本比率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>稅前純益佔實收資本比率(%)</span>
                                </div>
                                <canvas id="BNPBF" class="bckg"></canvas>
                            </div>
                            {{-- 純益率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>純益率(%)</span>
                                </div>
                                <canvas id="BNPM" class="bckg"></canvas>
                            </div>
                            {{-- 每股盈餘(元) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>每股盈餘(元)</span>
                                </div>
                                <canvas id="BEPS" class="bckg"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- 5.現金流量****************************************************************************************************** --}}
            <div class="tab-pane fade" id="v-pills-xxx" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                <div id="content">
                    <div id="main">
                        <div class="row">
                            <div class="col-12 main_title">
                                <div class="Cube">
                                    <span>
                                        現金流量&emsp;{{$id}}
                                    </span>
                                </div>
                            </div>
                        </div>
                        {{-- 5.現金流量 --}}
                        <div class="row area">
                            {{-- 現金流量比率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>現金流量比率(%)</span>
                                </div>
                                <canvas id="BCFA" class="bckg"></canvas>
                            </div>
                            {{-- 現金流量允當比率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>現金流量允當比率(%)</span>
                                </div>
                                <canvas id="BCFAR" class="bckg"></canvas>
                            </div>
                            {{-- 現金再投資比率(%) --}}
                            <div class="col-12 area_title">
                                <div class="Cube">
                                    <span>現金再投資比率(%)</span>
                                </div>
                                <canvas id="BCRR" class="bckg"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')

<script>
    var res = {!! json_encode($finance_data) !!};

    console.log(res);

    var ctx = document.getElementById('Debtratio').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

//   負債佔資產比率(%)
    var chart = new Chart(ctx, {
        type: 'bar',
        data: {

            datasets: [
                {
                    label: '負債比率(%)',
                    data: res[0].debtratio,
                    fill:false,
                    pointRadius: 0,
                    backgroundColor:'rgba(30,144,255, 0.7)',

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

// *******************************************************************************


//   2.償債能力
    //流動比率(%)
    var ctx = document.getElementById('Currentratio').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {

            datasets: [

                {
                    label: '流動比率(%)',
                    data: res[1].currentratio,
                    fill:false,
                    pointRadius: 0,
                    backgroundColor:'rgba(30,144,255, 0.7)',
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
        type: 'bar',
        data: {

            datasets: [

                {
                    label: '速動比率(%)',
                    data: res[1].quickratio,
                    fill:false,
                    pointRadius: 0,
                    backgroundColor:'rgba(30,144,255, 0.7)',
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
        type: 'bar',
        data: {

            datasets: [

                {
                    label: '利息保障倍數(%)',
                    data: res[1].interestcoverageratio,
                    fill:false,
                    pointRadius: 0,
                    backgroundColor:'rgba(30,144,255, 0.7)',
                },
            ],

            // 註解時間
            labels: res[0].time,

        },


    });

// *******************************************************************************
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



// 4.獲利能力**************************************************************
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




// 5.現金流量**************************************************************

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
