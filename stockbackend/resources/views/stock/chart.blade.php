@extends('layouts/nav')
@section('css')
<script
src="https://cdn.polyfill.io/v2/polyfill.js?features=default,String.prototype.repeat,Array.prototype.find,Array.prototype.findIndex,Math.trunc,Math.sign"></script>
<script src="https://cdn.jsdelivr.net/npm/luxon@1.19.3"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.0"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-luxon@0.2.0"></script>
<script src="./js/chartjs-chart-financial.js" type="text/javascript"></script>
@endsection
@section('content')
<div style="width:1000px">
    <canvas id="chart"></canvas>
</div>

@endsection
@section('js')
    <script>
        var res = {!! json_encode($data) !!};

        var data =[]
        var open = res.Open;
        var close = res.Close;
        var high = res.High;
        var low = res.Low;
        var time = res.time;




        // res.forEach((element,index) => {
        //     newDate = luxon.DateTime.fromRFC2822(element.time)
        //     res[index].time = newDate.valueOf()
        // });
        // console.log(res)
         time.forEach((element, index) => {
            var date = luxon.DateTime.fromRFC2822(element);
            data[index] =
            {
                t: date.valueOf(),
            };
        });

        open.forEach((element, index) => {
            data[index].o = `${element}`;

        });

		high.forEach((element, index) => {
            data[index].h = `${element}`;
		});

		low.forEach((element, index) => {
            data[index].l = `${element}`;
        });


        close.forEach((element, index) => {
            data[index].c = `${element}`;

        });
        console.log(data)

        var ctx = document.getElementById('chart').getContext('2d');
        ctx.canvas.width = 1000;
        ctx.canvas.height = 250;
        var chart = new Chart(ctx, {
            type: 'candlestick',
            data: {

                datasets: [{

                    label: '蠟燭圖',
                    data: data
                }]
            },

        });
    </script>
@endsection
