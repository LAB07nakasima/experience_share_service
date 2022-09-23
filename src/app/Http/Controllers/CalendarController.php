<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Calendar;
// use App\Http\Controllers\JavaScript;
use JavaScript;
use Illuminate\Support\Facades\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    public function index()
    {
        // これでbladeへJSが渡せる
        // JavaScript::put([
        //     'title' => 'bar',
        //     'user' => '1',
        //     'start' => 29
        // ]);

        // return View::make('test');

        $user = Auth::user();
        $user_calender = $user->calenders()->get();
        $schedule =[];
        
         foreach($user_calender as $data){
            $schedule[]=[
                    'title' => $data->schedule,
                    'start' => $data->start_date,
                    'end' => $data->end_date
            ];
        }
        JavaScript::put(['specialDay'=>$schedule]);
        // JavaScript::put([
        //     'title' => $schedule_data->schedule,
        //     'start' => $schedule_data->start_date,
        //     'end' => $schedule_data->end_date
        // ]);

        // dd($schedule_datas, $data->schedule,$data->start_date,$data->end_date);

        return View::make('test');
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
        // dd($request);

        //バリデーション
        $validator =  Validator::make($request->all(),[
            'schedule' => 'required|string|max:35',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        // バリデーションエラー
        if ($validator->fails()){
            return redirect()
                ->route('test.add')
                ->withInput()
                ->withErrors($validator);
        }

        // 登録処理
        $schedules = new Calendar();
        // 日付に変換。JavaScriptのタイムスタンプはミリ秒なので秒に変換
        // $schedules->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        // $schedules->end_date = date('Y-m-d', $request->input('end_date') / 1000);

        $schedules->start_date =  $request->input("start_date");
        $schedules->end_date =  $request->input("end_date");
        $schedules->schedule = $request->input('schedule');
        $schedules->user_id = Auth::user()->id ;
        $schedules->save();
        // dd($request->input("start_date"));

        // return;
        return redirect()->route('test.index');
    }

};
