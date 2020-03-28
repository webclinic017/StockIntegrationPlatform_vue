@extends('layouts/nav')


@section('content')
<section class="container">

    <div id="content">

        <div id="main">
            <!-- 公司資料 -->
            <div class="row main_title">
                <div class="col-12">
                    <div class="Cube">
                        <span>
                            法說會資訊
                        </span>
                    </div>
                </div>
            </div>
            <!-- 基本資料,股東會及最近一年配股 -->
            <div class="row ">
                <div class="col-12 area">
                    <div class="row">
                        <div class="col-12 area_title"></div>
                    </div>
                    <div class="row area_content">
                        <div class="col-4 SubTitle">
                            <div class="Cube">
                                <span>說明會日期</span>
                            </div>
                        </div>
                        <div class="col-8 content">
                            <div class="Cube">
                                <span>{{$concall_data->date}}</span>
                            </div>
                        </div>
                        <div class="col-4 SubTitle">
                            <div class="Cube">
                                <span>說明會地點</span>
                            </div>
                        </div>
                        <div class="col-8 content">
                            <div class="Cube">
                                <span>{{$concall_data->location}}</span>
                            </div>
                        </div>
                        <div class="col-4 SubTitle">
                            <div class="Cube">
                                <span>擇要訊息</span>
                            </div>
                        </div>
                        <div class="col-8 content">
                            <div class="Cube">
                                <span>{{$concall_data->import_info}}</span>
                            </div>
                        </div>
                        <div class="col-4 SubTitle">
                            <div class="Cube">
                                <span>簡報內容</span>
                            </div>
                        </div>
                        <div class="col-8 content">
                            <div class="Cube">
                            {{-- 中文檔 --}}
                                <span>
                                    中文檔:<a href="{{$concall_data->chinese_href}}">
                                        {{$concall_data->chinese_file}}
                                    </a>
                                </span>
                                &emsp;,&emsp;
                            {{-- 英文檔 --}}
                                <span>
                                    英文檔:<a href="{{$concall_data->english_href}}">
                                        {{$concall_data->english_file}}
                                    </a>
                                </span>
                            </div>
                        </div>
                        <div class="col-4 SubTitle">
                            <div class="Cube">
                                <span>相關資訊</span>
                            </div>
                        </div>
                        <div class="col-8 content">
                            <div class="Cube">
                                <span><a href="{{$concall_data->info}}">{{$concall_data->info}}</a>
                                </span>
                            </div>
                        </div>
                        <div class="col-4  SubTitle">
                            <div class="Cube">
                                <span>影音連結</span>
                            </div>
                        </div>
                        <div class="col-8 content">
                            <div class="Cube">
                                <span>{{$concall_data->video}}</span>
                            </div>
                        </div>
                        <div class="col-4  SubTitle">
                            <div class="Cube">
                                <span>其他應敘明事項</span>
                            </div>
                        </div>
                        <div class="col-8 content">
                            <div class="Cube">
                                <span>{{$concall_data->other}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
