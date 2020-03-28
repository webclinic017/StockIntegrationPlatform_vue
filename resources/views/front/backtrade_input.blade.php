@extends('layouts/nav')

@section('css')

<style>
    .container {
        height: 100vh;
    }
</style>


@endsection



@section('content')

<section class="container">
    <div id="content">
        <div id="main">
            <div class="row main_title">
                <div class="col-12">
                    <div class="Cube">
                        <span>
                            股票代號&emsp;{{$id}}
                        </span>
                    </div>
                </div>
            </div>
            <div class="row area">
                <div class="col-12">
                    <form method="POST" action="/backtrade/{{$id}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row area_content">
                            <div class="form-group col-6 SubTitle">
                                <label for="stock_begin_dt">起始時間(起始和終止時間之間的天數差距不能超過平均數)</label>
                                <input type="date" class="form-control" id="stock_begin_dt" name="stock_begin_dt" required>
                            </div>
                            <div class="form-group col-6 SubTitle">
                                <label for="stock_end_dt">終止時間(可輸入今天以前的任何日期)</label>
                                <input type="date" class="form-control" id="stock_end_dt" name="stock_end_dt" required>
                            </div>
                        </div>
                        {{-- 新加的 --}}
                        <div class="row area_content">
                            <div class="col-12 SubTitle">
                                <label for="stock_mean">平均數(整數)</label>
                                <input type="number" class="form-control" id="stock_mean" name="stock_mean" required>
                            </div>
                        </div>
                        <div class="row area_content">
                            <div class="col-12 SubTitle">
                                <label for="stock_std">標準差(可輸入整數和小數點)</label>
                                <input type="number" step="0.01" class="form-control" id="stock_std" name="stock_std" required>
                            </div>
                        </div>
                        <div class="row area_content">
                            <div class="col-12 SubTitle">
                                <label for="stock_principle">投入金額(整數)</label>
                                <input type="number" class="form-control" id="stock_principle" name="stock_principle" required>
                            </div>
                        </div>
                        {{-- 新加欄位結束 --}}
                        <div class="row area_title">
                            <div class="col-12 SubTitle">
                                <button type="submit" class="btn btn-primary col-2">送出</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
