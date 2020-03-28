@extends('layouts/nav')



@section('content')
<section class="container">

    <div id="content">

        <div id="main">
            <!-- 公司資料 -->
            <div class="row">
                <div class="col-12 main_title">
                    <div class="Cube">
                        <span>
                            公司資料
                        </span>
                    </div>
                </div>
            </div>


            <!-- 基本資料,股東會及最近一年配股 -->

            <div class="row ">
                <div class="col-6 area">
                    <div class="row area_title">
                        <div class="col-12">
                            <div class="Cube">
                                <span>基本資料</span>
                            </div>
                        </div>
                    </div>
                    <div class="row area_content">
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>公司名稱</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->company}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>產業類別</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->industry}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>成立時間</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->start_time}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>上市(櫃)時間</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->IPO}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>董事長</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->Chairman}}</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-6 area">

                    <div class="row area_title">
                        <div class="col-12 ">
                            <div class="Cube">
                                <span>資本額與發行股票資訊</span>
                            </div>
                        </div>
                    </div>

                    <div class="row area_content">
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>實收資本</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->capital}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>已發行普通股</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->publiccommon_stock}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>普通股股面額</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->common_stock}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>特別股數</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->preferred_stock}}</span>
                            </div>
                        </div>
                        <div class="col-5 SubTitle">
                            <div class="Cube">
                                <span>投資人關係聯絡人</span>
                            </div>
                        </div>
                        <div class="col-7 content">
                            <div class="Cube">
                                <span>{{$basic_data->investman}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div class="col-12 area">
                    <div class="row area_title">
                        <div class="col-12">
                            <div class="Cube">
                                <span>主要營業項目</span>
                            </div>
                        </div>
                    </div>

                    <div class="row area_content">
                        <div class="col-12 content">
                            <div class="Cube">
                                <span>{{$basic_data->Main_business}}</span>
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



@endsection
