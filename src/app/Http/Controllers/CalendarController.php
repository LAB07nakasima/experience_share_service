<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
// use App\Http\Controllers\JavaScript;
use JavaScript;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;


class CalendarController extends Controller
{
    public function index()
    {
        JavaScript::put([
            'title' => 'bar',
            'user' => '1',
            'start' => 29
        ]);

        return View::make('test');

        // return view('test');
    }

    public function create()
    {
        // JavaScript::put([
        //     'title' => '卒業式',
        //     'start' => '開始日',
        //     'end' => '終了日'
        // ]);

        // return View::make('hello');

        JavaScript::put([
            'foo' => 'bar',
            'user' => User::first(),
            'age' => 29
        ]);

        return View::make('hello');
        // return redirect('/');
    }

    /**
     * イベントを登録
     *
     * @param  Request  $request
     */
    public function scheduleAdd(Request $request)
    {
        // バリデーション
        // $request->validate([
        //     'start_date' => 'required|integer',
        //     'end_date' => 'required|integer',
        //     'schedule' => 'required|max:32',
        // ]);

        // dd($request);
        // 登録処理
        // $schedule = new Calendar();
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        // $schedule->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        // $schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        // $schedule->schedule = $request->input('schedule');
        // $schedule->save();

        // return;
        return view('test');
    }

};
