@extends('layouts/nav')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset("css/basic_info.css")}}">
<script
src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>
<script src="{{ asset('js/historical-stock.js') }}" ></script>
<script src="{{ asset('js/chartjs-chart-financial.js') }}" ></script>

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
<section class="container">


    <!-- tab-all -->
    <div class="row main-btn ">
        <div class="col-3 ">
            <button id="basic-information" type="button" class="Cube">基本資料</button>
        </div>
        <div class="col-3 ">
            <button id="news" type="button" class="Cube">新聞</button>
        </div>
        <div class="col-3 ">
            <button id="historical-stock" type="button" class="Cube">歷史股價</button>
        </div>
        <div class="col-3 ">
            <button id="analysis" type="button" class="Cube">回測</button>
        </div>
    </div>


    <main id="content">

        <main id="content">

            <div id="basic-information-content">
                <!-- 公司資料 -->
                <div class="row company">
                    <div class="col-12">
                        <div class="Cube">
                            <span>
                                公司資料
                            </span>
                        </div>
                    </div>
                </div>


                <!-- 基本資料,股東會及最近一年配股 -->

                <div class="row ">

                    {{-- 副標 --}}
                    <div class="col-6">
                        <div class="row company-title">
                            <div class="col-12">
                                <div class="title-Cube">
                                    <span>基本資料</span>
                                </div>
                            </div>
                        </div>

                        {{-- 內容 --}}
                        <div class="row content">
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>產業類別</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->industry}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>成立時間</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->start_time}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>上市(櫃)時間</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->IPO}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>董事長</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Chairman}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>總 經 理</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->manager}}</span>
                                </div>
                            </div>
                            <div class="col-4  company-SubTitle">
                                <div class="Cube">
                                    <span>營收比重</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Revenue_share}}</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-6">

                        {{-- 副標 --}}
                        <div class="row company-title">
                            <div class="col-12 ">
                                <div class="title-Cube">
                                    <span>股東會及最近一年配股</span>
                                </div>
                            </div>
                        </div>

                        {{-- 內容 --}}
                        <div class="row content">
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>現金股利</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Cash_dividend}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>股東會日期</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Shareholders_date}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>公積配股</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Public_reserve}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>盈餘配股</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->earning_reserve}}</span>
                                </div>
                            </div>
                            <div class="col-4 company-SubTitle">
                                <div class="Cube">
                                    <span>股票股利</span>
                                </div>
                            </div>
                            <div class="col-8 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->stock_dividend}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- 最新一季獲利能力 -->
                <div class="row ">
                    <div class="col-4">

                        {{-- 副標 --}}
                        <div class="row company-title">
                            <div class="col-12">
                                <div class="title-Cube">
                                    <span class="">最新一季獲利能力</span>
                                </div>
                            </div>
                        </div>

                        {{-- 內容 --}}
                        <div class="row content">
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>營業毛利率</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Operating_margin}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>營業利益率</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Operating_profit}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>稅前淨利率</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Net_interest_beforetax}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>資產報酬率</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->ROA}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">

                        {{-- 副標 --}}
                        <div class="row company-title ">
                            <div class="col-12">
                                <div class="title-Cube">
                                    <span class="">最新四季每股盈餘</span>
                                </div>
                            </div>
                        </div>

                        {{-- 內容 --}}
                        <div class="row content">
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>第1季</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->first_eps}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>第2季</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->second_eps}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>第3季</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->third_eps}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>第4季</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->four_eps}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">

                        {{-- 副標 --}}
                        <div class="row company-title">
                            <div class="col-12">
                                <div class="title-Cube">
                                    <span class="">最近四年每股盈餘</span>
                                </div>
                            </div>
                        </div>

                        {{-- 內容 --}}
                        <div class="row content">
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>107年</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->yfirst_eps}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>106年</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->ysecond_eps}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>105年</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->ythird_eps}}</span>
                                </div>
                            </div>
                            <div class="col-6 company-SubTitle">
                                <div class="Cube">
                                    <span>104年</span>
                                </div>
                            </div>
                            <div class="col-6 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->yfour_eps}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- 除 權 息 資 料 -->
                <div class="row ">
                    <div class="col-8">

                        {{-- 副標 --}}
                        <div class="row company-title">
                            <div class="col-12">
                                <div class="title-Cube">
                                    <span class="">除 權 息 資 料</span>
                                </div>
                            </div>
                        </div>

                        {{-- 內容 --}}
                        <div class="row content">
                            <div class="col-3 company-SubTitle">
                                <div class="Cube">
                                    <span>除權日期</span>
                                </div>
                            </div>
                            <div class="col-3 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Exrights}}</span>
                                </div>
                            </div>
                            <div class="col-3 company-SubTitle">
                                <div class="Cube">
                                    <span>除息日期</span>
                                </div>
                            </div>
                            <div class="col-3 company-content">
                                <div class="Cube">
                                    <span>{{$data_news[0]->Exdate}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


                             {{--      新聞        --}}
            <div id="news-content">
                <table id="news-data" class="table table-striped table-bordered " style="width:100%">
                    <thead>
                        <tr>
                            <th>日期</th>
                            <th>新聞</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_news[1] as $item)
                        <tr>
                            <td>
                                <div class="Cube">
                                   {{$item->time}}
                                </div>
                            </td>
                            <td>
                                <div class="Cube-content">
                                    {{$item->title}}
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>

        <div id="historical-stock-content">
            <form class="row company-title d-flex justify-content-center" action="">
                <div class="col-3">
                    <div class="Cube">
                        <input type="date">
                    </div>
                </div>
                <div class="col-3">
                    <div class="Cube">
                        <input type="date">
                    </div>
                </div>
            </form>
            <div style="width:1000px">
                <canvas id="chart"></canvas>
            </div>
        </div>

        <div id="analysis-content">
            <form class="row company-title d-flex justify-content-center" action="">
                <div class="col-3">
                    <div class="Cube">
                        <input type="date">
                    </div>
                </div>
                <div class="col-3">
                    <div class="Cube">
                        <input type="date">
                    </div>
                </div>
            </form>
            <div class="container">
                <div id="win" class="d-flex">
                    {{-- <span></span>
                    <span></span>
                    <span></span> --}}
                </div>

                <div class="myChartDiv">
                    <canvas id="Chart_bband" width="600" height="400"></canvas>
                </div>

                <div class="myChartDiv">
                    <canvas id="Chart2_tradecum" width="600" height="400"></canvas>
                </div>
            </div>
        </div>

    </main>




</section>

@endsection

@section('js')
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" defer></script>

<script>
    var rrs = {!! json_encode($data) !!};

    var data =[]

    var time = rrs.t;


    rrs.forEach((element,index) => {
        newDate = luxon.DateTime.fromRFC2822(element.t)
        rrs[index].t = newDate.valueOf()
    });


    // console.log(rrs)

    var ctx = document.getElementById('chart').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;
    var chart = new Chart(ctx, {
        type: 'candlestick',
        data: {

            datasets: [{

                label: '蠟燭圖',
                data: rrs
            }]
        },

    });
</script>

<script>
    var win = document.querySelector('#win');
    var res = {!! json_encode($data_backtest) !!};
    // console.log(res);
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
    // console.log(res[3]);
    var ctx = document.getElementById('Chart_bband').getContext('2d');
    ctx.canvas.width = 1000;
    ctx.canvas.height = 250;

    var Chart_bband = new Chart(ctx, {
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
            labels: res[4],
        },


    });

</script>

<script>
    $(document).ready(function () {
        $('#news-data').DataTable({
            "language": {
                "lengthMenu": "顯示 _MENU_ 比資料",
                "zeroRecords": "抱歉 找不到此筆資料",
                "info": "目前第 _PAGE_ 頁 總共 _PAGES_ 頁",
                "infoEmpty": "",
                "infoFiltered": "",
                "search": "搜索 :",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "下一頁",
                    "previous": "上一頁",
                },
            },
        });
    });

    $('#basic-information').click( function (){
        $('#basic-information-content').css("display","block");
        $('#news-content').css("display","none");
        $('#historical-stock-content').css("display","none");
        $('#analysis-content').css("display","none");
    });
    $('#news').click( function (){
        $('#basic-information-content').css("display","none");
        $('#news-content').css("display","block");
        $('#historical-stock-content').css("display","none");
        $('#analysis-content').css("display","none");
    });
    $('#historical-stock').click( function (){
        $('#basic-information-content').css("display","none");
        $('#news-content').css("display","none");
        $('#historical-stock-content').css("display","block");
        $('#analysis-content').css("display","none");
    });
    $('#analysis').click( function (){
        $('#basic-information-content').css("display","none");
        $('#news-content').css("display","none");
        $('#historical-stock-content').css("display","none");
        $('#analysis-content').css("display","block");
    });



</script>





@endsection
