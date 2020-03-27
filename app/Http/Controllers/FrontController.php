<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front/index');
    }

    // 公司基本資料
    public function basic_info($id)
    {
        $no = $id;
        $jsonbasic = shell_exec("python python/newcrawl_basic.py $no");
        // dd($jsonbasic);
        $basic_data = json_decode($jsonbasic);
        // dd($basic_data);
        return view('front/basic_info', compact('basic_data','id'));
    }

    // 財務資訊
    public function finance($id)
    {
        $no = $id;
        // dd($no);
        $jsonbasic = shell_exec("python python/crawl_finance.py $no");
        // dd($jsonbasic);
        $finance_data = json_decode($jsonbasic);
        // dd($finance_data);
        return view('front/finance', compact('finance_data','id'));
    }


    // 法說會
    public function concall($id)
    {
        $no = $id;
        $jsonbasic = shell_exec("python python/new_crawlconcile.py $no");
        // dd($jsonbasic);
        $concall_data = json_decode($jsonbasic);
        // dd($concall_data);
        return view('front/concall', compact('concall_data','id'));
    }


    // 歷史資料
    public function history($id)
    {
        $no = $id . '.TW';
        $begin_dt = "2019-01-01";
        $end_dt = "2019-01-30";

        $jsondata5 = shell_exec("python python/crawl_historic_v2.py $no $begin_dt $end_dt");
        $st_word = stripos($jsondata5, "completed") + 9;
        $data_backtest = json_decode(substr($jsondata5, $st_word));
        //  dd($data_backtest);
        return view('front/history', compact('data_backtest','id'));
    }

    // 交易回測
    public function backtrade_input($id)
    {
        return view('front/backtrade_input',compact('id'));
    }

    public function backtrade(Request $request,$id)
    {
        $stock_data = $request->all();
        // dd($stock_data);
        // 股票資料
        // $no = $stock_data["stock_id"] . '.TW';
        $no = $id . '.TW';
        $begin_dt = $stock_data["stock_begin_dt"];
        $end_dt = $stock_data["stock_end_dt"];

        #--------新加欄位---------------
        $start_mean = $stock_data["stock_mean"];
        $start_std = $stock_data["stock_std"];
        $start_principle = $stock_data["stock_principle"];
        //   dd($start_mean);
        #---------新加欄位結束--------------------

        //   $start_mean $start_std $start_principle
        // bband_finaltest.py
        $jsondata5 = shell_exec("python python/bband_finaltest.py $no $begin_dt $end_dt $start_mean $start_std $start_principle");
        //   dd($jsondata5);

        // 先找到completed的字串位置從起始到結束有幾個
        $st_word = stripos($jsondata5, "completed") + 9;
        //   dd($st_word);

        $data_backtest = json_decode(substr($jsondata5, $st_word));
        //   dd($data_backtest);

        return view('front/backtrade', compact('data_backtest' ,'id'));
        // python結束
    }

}
