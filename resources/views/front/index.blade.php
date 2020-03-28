<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FIP 輕鬆投</title>
    <link rel="shortcut icon" href="./img/index/interview.png" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset("css/index.css")}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:100,200,300,400,500,600,700,800,900&display=swap">
    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>


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

    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
