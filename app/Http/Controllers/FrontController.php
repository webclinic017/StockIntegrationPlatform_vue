<?php

namespace App\Http\Controllers;

use App\Basic_info;
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
        $stock_id = Basic_info::where('stock_id', $id)->first();
        if( $stock_id != null) {
            $basic_data = Basic_info::where('stock_id', $id)->first();
        }
        else {

            $stock_id = Basic_info::where('stock_id', $basic_data->stock_id)->first();
            if($stock_id == null){
                $jsonbasic = shell_exec("python python/newcrawl_basic.py $id");
                $basic_data = json_decode($jsonbasic);
                $Basic = new Basic_info();
                $Basic->stock_id = $basic_data->stock_id;
                $Basic->company =$basic_data->company;
                $Basic->industry =$basic_data->industry;
                $Basic->start_time =$basic_data->start_time;
                $Basic->IPO =$basic_data->IPO;
                $Basic->Chairman =$basic_data->Chairman;
                $Basic->capital =$basic_data->capital;
                $Basic->publiccommon_stock =$basic_data->publiccommon_stock;
                $Basic->common_stock =$basic_data->common_stock;
                $Basic->preferred_stock =$basic_data->preferred_stock;
                $Basic->investman =$basic_data->investman;
                $Basic->Main_business =$basic_data->Main_business;
                $Basic->save();
            }

            $basic_data = Basic_info::where('stock_id', $id)->first();
        }

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
        // $no = $id;
        // $jsonbasic = shell_exec("python python/new_crawlconcile.py $no");
        // dd($jsonbasic);
        // $concall_data = json_decode($jsonbasic);
        $jsonbasic = file_get_contents('C:/Users/Brian/Documents/GitHub/StockIntegrationPlatform_vue/public/python/concall.json');
        $jsonbasic = json_decode($jsonbasic);
        dd($jsonbasic);
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
