<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>輕鬆投</title>
    <link rel="shortcut icon" href="./img/index/interview.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset("css/nav.css")}}">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">

    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>


<body>



    <div id="app">
        <section class="container-all d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="search-box col-4">
                    <h1>輕鬆投</h1>
                        <h3>智能投資</h3>
                        <div class="col-12 form-group flex-column">
                            <form action="/basic_info">
                                {{-- <input id="checkID" type="text" class="form-control search-form border-0" placeholder="股票代碼"> --}}
                                {{-- <span id="test_result" class="d-flex justify-content-center"></span> --}}
                                <index-select></index-select>
                            </form>
                        </div>
                        <span class="pb-3 d-flex justify-content-center">輕鬆分析，聰明投資</span>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <script src="{{asset("/assets/web/assets/jquery/jquery.min.js")}}"></script> {{--AJAX需載入此行--}}

    <script>
        // $(document).ready(function() {

        //     $('#checkID').change(function(){
        //         var ID;
        //         ID = $('#checkID').val();

        //         $.ajaxSetup({
        //             headers: {
        //                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //             }
        //         });

        //         $.ajax({
        //             method: 'GET',
        //             url: '/ajax/checkID',
        //             contentType: false,
        //             cache: false,
        //             processData: false,
        //             // data: ,
        //             success: function (res) {
        //                 if (res == true) {
        //                     $("#test_result").text("請輸入Enter查詢");
        //                     $("#test_result").css("color","#41c44e");

        //                 } else {
        //                     $("#test_result").text("查無此代碼");
        //                     $("#test_result").css("color","#41c44e");
        //                 }
        //             },
        //             error: function (jqXHR, textStatus, errorThrown) {
        //                 console.error(textStatus + " " + errorThrown);
        //             }
        //         });

        //     });
        // });

    </script>

</body>

</html>
