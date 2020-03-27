<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>輕鬆投</title>
    <link rel="shortcut icon" href="{{asset('img/index/interview.png')}}" type="image/x-icon">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+TC:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">
    <script src="https://unpkg.com/vue-multiselect@2.1.0"></script>

    @yield('css')
</head>


<body>

    <div id="app">
        <main class="container-fluid d-flex p-0 justify-content-between">
            <div id="content-left">
                <nav class="row d-flex align-items-center flex-column">
                    <div class="Cube">
                        <a href="/">
                            <h2>輕鬆投</h2>
                        </a>
                    </div>
                    <div class="mb-3">
                        <form action="">
                            <index-select></index-select>
                        </form>
                    </div>
                    <div class="col-12 d-flex align-items-center flex-column">
                        <div class="accordion" id="accordionExample">
                            <div class="nav-btn">
                                <a href="/basic_info/{{$id}}">
                                    <div class="nav-btn-header center" id="heading-1">
                                        <button class="" type="button" data-toggle="collapse" data-target="#nav-btn-1"
                                            aria-expanded="true" aria-controls="nav-btn-1">
                                            公司資料
                                        </button>
                                    </div>
                                </a>
                                <!-- <div id="nav-btn-1" class="collapse show center" aria-labelledby="heading-1"
                                    data-parent="#accordionExample">
                                    <div class="nav-btn-body">
                                        <ul>
                                            <li>
                                                <a href="">公司資料</a>
                                            </li>
                                            <li>
                                                <a href="">財務資訊</a>
                                            </li>
                                            <li>
                                                <a href=""></a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div> -->
                            </div>
                            <div class="nav-btn">
                                <a href="/finance/{{$id}}">
                                    <div class="nav-btn-header center" id="heading-2">
                                        <button class="collapsed" type="button" data-toggle="collapse" data-target="#nav-btn-2"
                                            aria-expanded="true" aria-controls="nav-btn-2">
                                            財務資訊
                                        </button>
                                    </div>
                                </a>
                                <div id="nav-btn-2" class="collapse center show" aria-labelledby="heading-2"
                                    data-parent="#accordionTest" >
                                    <div class="nav-btn-body">
                                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                            aria-orientation="vertical">
                                            <a class=" active" id="v-pills-home-tab" data-toggle="pill"
                                                href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                                aria-selected="true">財務結構</a>

                                            <a class="" id="v-pills-profile-tab" data-toggle="pill"
                                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                                aria-selected="false">償債能力</a>

                                            <a class="" id="v-pills-messages-tab" data-toggle="pill"
                                                href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                                aria-selected="false">經營能力</a>

                                            <a class="" id="v-pills-settings-tab" data-toggle="pill"
                                                href="#v-pills-settings" role="tab" aria-controls="v-pills-settings"
                                                aria-selected="false">獲利能力</a>

                                            <a class="" id="v-pills-settings-tab" data-toggle="pill"
                                            href="#v-pills-xxx" role="tab" aria-controls="v-pills-xxx"
                                            aria-selected="false">現金流量</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-btn">
                                <a href="/concall/{{$id}}">
                                    <div class="nav-btn-header center" id="heading-4">
                                        <button class="" type="button" data-toggle="collapse" data-target="#nav-btn-4"
                                            aria-expanded="true" aria-controls="nav-btn-4">
                                            法說會資訊
                                        </button>
                                    </div>
                                </a>
                                <!-- <div id="nav-btn-3" class="collapse show center" aria-labelledby="heading-3"
                                    data-parent="#accordionExample">
                                    <div class="nav-btn-body">
                                        <ul>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div> -->
                            </div>
                            <div class="nav-btn">
                                <a href="/history/{{$id}}">
                                    <div class="nav-btn-header center" id="heading-4">
                                        <button class="" type="button" data-toggle="collapse" data-target="#nav-btn-4"
                                            aria-expanded="true" aria-controls="nav-btn-4">
                                            歷史資料
                                        </button>
                                    </div>
                                </a>

                                <!-- <div id="nav-btn-4" class="collapse show center" aria-labelledby="heading-4"
                                    data-parent="#accordionExample">
                                    <div class="nav-btn-body">
                                        <ul>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div> -->
                            </div>
                            <div class="nav-btn">
                                <a href="/backtrade_input/{{$id}}">
                                    <div class="nav-btn-header center" id="heading-4">
                                        <button class="" type="button" data-toggle="collapse" data-target="#nav-btn-4"
                                            aria-expanded="true" aria-controls="nav-btn-4">
                                            回測
                                        </button>
                                    </div>
                                </a>

                                <!-- <div id="nav-btn-4" class="collapse show center" aria-labelledby="heading-4"
                                    data-parent="#accordionExample">
                                    <div class="nav-btn-body">
                                        <ul>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                            <li>
                                                <a href="">aaaa</a>
                                            </li>
                                        </ul>

                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="content-mid">



                @yield('content')

            </div>
            <div id="content-right">
                <section id="member" class="row d-flex align-items-center flex-column">
                    <div class="user-photo">
                        <img src="{{asset('img/index/interview.png')}}" alt="">
                    </div>
                    <div class="Cube">
                        <button type="button" class="btn text-white btn-lg ">登入</button>
                        <button type="button" class="btn text-white btn-lg border-light">會員註冊</button>
                    </div>
                </section>
            </div>
        </main>
    </div>




    <script src="{{asset("/assets/web/assets/jquery/jquery.min.js")}}"></script> {{--AJAX需載入此行--}}

    <script src="{{ asset('js/app.js') }}"></script>

    @yield('js')

</body>

</html>
