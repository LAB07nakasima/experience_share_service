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

        // ログインしているユーザーのカレンダーのデータを取得する
        $user = Auth::user();
        // リレーションのcalendars()で取得 $user->で取れるのは、UserモデルがAuth継承してるから
        // array_map関数でも可 使い方は.map()とほぼ一緒
        $user_calender = $user->calenders()->get();

        $google_schedule = [];
        foreach($user_calender as $gs){
            $google_schedule[] = [
                'title' => $gs->schedule,
                'start_date' => $gs->start_date,
                'end_date' => $gs->end_date
            ];
        }

        $google_url = [];
        foreach ($google_schedule as $data) {
        $url = [ "http://www.google.com/calendar/event?"
            ."action="  ."TEMPLATE"
            ."&text="   .$data["title"]
            ."&dates"   .$data["start_date"]. "/" . $data["end_date"]
        ];
        // dd($url);
        array_push($google_url, $url);
        };

        // $schedule =[];
        //foreach（）は処理を繰り返す
        // foreach($user_calender as $data){
        //     $schedule[]=[
        //             'title' => $data->schedule,
        //             'start' => $data->start_date,
        //             'end' => $data->end_date ,
        //             'description' => $url
        //     ];
        // }


        // テスっと
        $schedule =[];
        //foreach（）は処理を繰り返す
        foreach($user_calender as $data){
            $url =  "http://www.google.com/calendar/event?"
            ."action="  ."TEMPLATE"
            ."&text="   .$data->schedule
            ."&dates="  .str_replace('-','', $data->start_date) . '/' . str_replace('-','', $data->end_date);
            // 20151026T100000
            $schedule[]=[
                    'title' => $data->schedule,
                    'start' => $data->start_date,
                    'end' => $data->end_date ,
                    // 'description' => $url ,
                    'details' => $url
            ];
        }
        // dd($schedule);

        // Javascriptにデータを渡す 'specialDay' => arrayデータ
        JavaScript::put([
            'specialDay'=>$schedule ,
            // 'googleUrl' => $google_url
        ]);

        return View::make('test');
    }

    public function create()
    {

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
