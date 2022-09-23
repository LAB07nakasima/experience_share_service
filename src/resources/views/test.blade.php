<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    {{-- テスト追加 --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.css">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

    {{-- 日本語化追加 --}}
    <script src='fullcalendar/dist/locale/ja.js'></script>
    {{-- JQuery追加 --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    {{-- moment.js 追加--}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- 通知機能 トースト --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- CSSファイルの読み込み --}}
    <link rel="stylesheet" href="/css/style.css">
    {{--  <link rel=“stylesheet” href=“{{ asset(‘css/create.style.css’) }}“> --}}
    {{-- フルカレンダーの機能？？必要か微妙 --}}
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.11.3/main.global.min.js"></script>
    {{-- jsファイルの読み込み --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- テスト用だから後で消す --}}
    <script src="{{ asset('js/calendar.js') }}"></script>

    <script>

        // document.getElementById('my-button').addEventListener('click', function() {
        //     var date = calendar.getDate();
        //         alert("The current date of the calendar is " + date.toISOString());
        // });


    document.addEventListener('DOMContentLoaded', function() {
        // $.get("https://holidays-jp.github.io/api/vi/date.json", function(holidayData) {
        var calendarEl = document.getElementById('calendar');

        let calendar = new FullCalendar.Calendar(calendarEl,
        {

            // ここに各種オプションを書いていく
            // 日本語設定
            locale: 'ja',
            timeZone: 'Asia/Tokyo',
            initialView: 'dayGridMonth',
            //
            headerToolbar: {
                left: 'prev',
                center: 'title',
                right: 'next'
            },
            // 土日の色付け
            businessHours: true,
            // 必要かよくわからない
            navilinks: true,
            // 表示期間
            validRange: {
                start: '2022-04-01' ,
                end: '2022-12-31'
            },

            // 本当はスタートなどを指定したい
            // validRange: function(nowDate) {
            //     return {
            //     start: nowDate,
            //     end: nowDate.clone().add(1, 'months')
            //     };
            // }

            // 日付ごとの初期化処理？
            dayCellContent: function(e) {
                // 日を非表示にする
                e.dayNumberText = e.dayNumberText.replace('日','');
            },

            // イベント（予定）設定
            events: getEventDates(),

            // 予定毎の初期化処理
            // eventContent: function (arg){},
            // イベントクリック時の処理
            // eventClick: function(info){}

            // 日付をクリック、または範囲を選択したイベント
            selectable: true,
            select: function (info) {
                // alert("selected " + info.startStr + " to " + info.endStr);

                // 入力ダイアログ
                const eventName = prompt("予定を入力してください");

                // if (eventName) {
                //     // Laravelの登録処理の呼び出し
                //     axios
                //         .post("/test/user.id", {
                //             start_date: info.start.valueOf(),
                //             end_date: info.end.valueOf(),
                //             schedule: eventName,
                //         })
                //         .then(() => {
                //             // イベントの追加
                //             calendar.addEvent({
                //                 // $jsondata.title
                //                 // $jsondata.start
                //                 title: eventName,
                //                 start: info.start,
                //                 end: info.end,
                //                 allDay: true,
                //             });
                //         })
                //         .catch(() => {
                //             // バリデーションエラーなど
                //             alert("登録に失敗しました");
                //         });
                // }
            },
        });

            // イベントを押すとモーダルウィンドウが開く
            // eventClick: function (info) {
            //     if (info.el.classList.contains("fc-h-event")) {
            //     showEventDialog(info); // モーダルウィンドウの関数
            //     }
            // }

        calendar.render();
        // });
    // console.log(end);

    });

    // 予定の取得
    function getEventDates() {

        // var specialDay = [
        //     // $json.dateでjsondateが帰ってくるはず。(オブジェクト型)
        //     // jsondate.map(title, start,end){}
        //     //calendar.titleでtitleが取れるようになってるはず
        //     // title: calendar.title ,
        //     {
        //         title: 'URL埋め込みテスト',
        //         start: '2022-09-28',
        //         url: 'https://gsacademy.jp/',
        //         className: 'テスト',
        //         specialDay: '2022-09-28'
        //     },
        //     {
        //         // 指定日付セル内の表示内容
        //         title: '卒制提出日',
        //             // 指定日付
        //         start: '2022-10-04',
        //             //カラーの表示
        //         color: '#ff9ff89'
        //     },
        //     // {
        //     //     title: window.title,
        //     //     start: window.start,
        //     //     end: window.end
        //     // },
        //     {
        //         title: title,
        //         start: start,
        //         end: end
        //     },
        // ];

        const data = {specialDay: specialDay};

        // const ary = data.specialDay.map(function(value){
        //     return {title:value.schedule,start:value.start_date,end:value.end_date};
        // })

        console.log(data.specialDay);
            // eventDates.push(specialDay);
            return data.specialDay;
    };


    // ライブラリの動作テスト
    // window.Laravel = {};


    $(document).ready(function(){

     console.log(window.title);
     console.log(window.start);
     console.log(window.end);

 })

    // console.log(Laravel.array);
    </script>
  </head>
  <body>
    <x-app-layout>
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('コメント') }}
          </h2>
        </x-slot>

        {{-- ここでcalendarの表示 --}}
        <div class="" id='calendar'></div>
        <div class="w-1/2 max-w-xs">
            <div class="bg-gray-100">
                <form method="POST" action="{{ route('test.add') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">予定を入力する</label>
                            <input
                                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                id="schedule"
                                name="schedule"
                                {{-- value="{{ old('schedule_title') }}" --}}
                                type="text">

                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">開始日</label>
                            <input type="date" name="start_date">
                        <label class="block text-gray-700 text-sm font-bold mb-2">終了日</label>
                            <input type="date" name="end_date">
                            {{-- name: フォームの名前  value: 送信される値 --}}
                            <button type="submit" value="登録">カレンダーに登録</button>
                    </div>
                </form>
            </div>
        </div>
        @include ('footer')
    </x-app-layout>
  </body>
</html>
