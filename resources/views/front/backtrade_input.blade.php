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

{{-- <script src="{{ asset('js/historical-stock.js') }}" ></script> --}}
<script src="{{ asset('js/chartjs-chart-financial.js') }}" ></script>

<style>
    .container{
        height: 100vh;
    }
</style>




@endsection



@section('content')

<section class="container">

    <div id="content">

        <div id="basic-information-content">

            <div class="row company">
                <div class="col-12">
                    <div class="Cube">
                        <span>
                            股票代號&emsp;{{$id}}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container pt-5">

<form method="POST" action="/backtrade/{{$id}}" enctype="multipart/form-data">
    @csrf

    {{-- <div class="form-group">
        <label for="stock_id">股票代碼</label>
        <input type="text" class="form-control" id="stock_id" name="stock_id" placeholder="{{$id}}">
    </div> --}}

    <div class=" form-row col-12">
        <div class="form-group col-6">
            <label for="stock_begin_dt">起始時間(起始和終止時間之間的天數差距不能超過平均數)</label>
            <input type="date" class="form-control" id="stock_begin_dt" name="stock_begin_dt" required>
        </div>

        <div class="form-group col-6">
            <label for="stock_end_dt">終止時間(可輸入今天以前的任何日期)</label>
            <input type="date" class="form-control" id="stock_end_dt" name="stock_end_dt" required>
        </div>
    </div>


    {{-- 新加的 --}}
    <div class="form-group col-12">
        <label for="stock_mean">平均數(整數)</label>
        <input type="number" class="form-control" id="stock_mean" name="stock_mean" required>
    </div>

    <div class="form-group col-12">
        <label for="stock_std">標準差(可輸入整數和小數點)</label>
        <input type="number" step="0.01" class="form-control" id="stock_std" name="stock_std" required>
    </div>

    <div class="form-group col-12">
        <label for="stock_principle">投入金額(整數)</label>
        <input type="number" class="form-control" id="stock_principle" name="stock_principle" required>
    </div>

    {{-- 新加欄位結束 --}}
    <div class="row d-flex justify-content-center">
        <button type="submit" class="btn btn-primary col-2">送出</button>
    </div>

  </form>
</div>

@endsection

@section('js')


@endsection
