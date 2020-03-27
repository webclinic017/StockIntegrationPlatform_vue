@extends('layouts/nav')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset("css/basic_info.css")}}">
<script
    src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign">
</script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>

{{-- <script src="{{ asset('js/historical-stock.js') }}" ></script> --}}
{{-- <script src="{{ asset('js/chartjs-chart-financial.js') }}" ></script> --}}


@endsection



@section('content')
<section class="container">

    <div id="content">

        <div id="basic-information-content">
            <!-- 公司資料 -->
            <div class="row company">
                <div class="col-12">
                    <div class="Cube">
                        <span>
                            法說會
                        </span>
                    </div>
                </div>
            </div>


            <!-- 基本資料,股東會及最近一年配股 -->

            <div class="row ">


                <div class="col-12">
                    <div class="row">
                        <div class="col-12 company-title"></div>
                    </div>
                    <div class="row content">
                        <div class="col-4 company-SubTitle">
                            <div class="Cube">
                                <span>說明會日期</span>
                            </div>
                        </div>
                        <div class="col-8 company-content">
                            <div class="Cube">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-4 company-SubTitle">
                            <div class="Cube">
                                <span>說明會地點</span>
                            </div>
                        </div>
                        <div class="col-8 company-content">
                            <div class="Cube">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-4 company-SubTitle">
                            <div class="Cube">
                                <span>擇要訊息</span>
                            </div>
                        </div>
                        <div class="col-8 company-content">
                            <div class="Cube">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-4 company-SubTitle">
                            <div class="Cube">
                                <span>簡報內容</span>
                            </div>
                        </div>
                        <div class="col-8 company-content">
                            <div class="Cube">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-4 company-SubTitle">
                            <div class="Cube">
                                <span>相關資訊</span>
                            </div>
                        </div>
                        <div class="col-8 company-content">
                            <div class="Cube">
                                <span></span>
                            </div>
                        </div>
                        <div class="col-4  company-SubTitle">
                            <div class="Cube">
                                <span>影音連結</span>
                            </div>
                        </div>
                        <div class="col-8 company-content">
                            <div class="Cube">
                                <span>營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重</span>
                            </div>
                        </div>
                        <div class="col-4  company-SubTitle">
                            <div class="Cube">
                                <span>其他應敘明事項    </span>
                            </div>
                        </div>
                        <div class="col-8 company-content">
                            <div class="Cube">
                                <span>營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重營收比重</span>
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
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" defer></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" defer></script>

{{-- <script>
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
</script> --}}

{{-- <script>
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

</script> --}}

{{-- <script>
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



</script> --}}

@endsection
