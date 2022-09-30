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
    {{-- <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.11.3/main.global.min.js"></script> --}}
    <script src='fullcalendar/main.js'></script>

    {{-- jsファイルの読み込み --}}
    <script src="{{ asset('js/app.js') }}"></script>

    {{-- テスト用だから後で消す --}}
    {{-- <script src="{{ asset('js/calendar.js') }}"></script> --}}

    <script>

        // document.getElementById('my-button').addEventListener('click', function() {
        //     var date = calendar.getDate();
        //         alert("The current date of the calendar is " + date.toISOString());
        // });


    document.addEventListener('DOMContentLoaded', function() {
        // $.get("https://holidays-jp.github.io/api/vi/date.json", function(holidayData) {
        let calendarEl = document.getElementById('calendar');

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

            // 日付ごとの初期化処理？
            dayCellContent: function(e) {
                // 日を非表示にする
                e.dayNumberText = e.dayNumberText.replace('日','');
            },

            // イベント（予定）設定
            events: getEventDates(),

            // 日付をクリック、または範囲を選択したイベント
            selectable: true,
            // select: function (info) {
            //     alert("selected " + info.startStr + " to " + info.endStr);

                // 入力ダイアログ
                // const eventName = prompt("予定を入力してください");

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
                // console.log(info);
            // },

            // イベントを押すとモーダルウィンドウが開く
            eventClick: function (info) {
                alert('Event: ' + info.event.title + '\n' + 'URL :' + info.event.extendedProps.details )
                // showEventDialog(info.event.title, info.event.extendedProps.details);
                console.log(info.event.extendedProps.details);

                // モーダルウィンドウテスト
                // if (info.el.classList.contains("fc-h-event")) {
                //     showEventDialog(info.event._def); // モーダルウィンドウの関数
                // }

                // var info_data = '<a href="javascript:void(0);" class="close" onclick="return closeArea();">[close]</a><br>';
                // info_data += '<b>タイトル</b><br>\n';
                // info_data += info.title + '<br><br>\n';
                // info_data += '<b>本文</b><br>\n';
                // info_data += info.description + '\n';

                //<div id="detail-area"></div>の中にevent_dataを入れて表示させる
                // $('#detail-area').html(info_data).show();

            }
            // イベントを押すとモーダルウィンドウが開く
            // eventClick: function (info) {
            //     if (info.el.classList.contains("fc-h-event")) {
            //     showEventDialog(info); // モーダルウィンドウの関数
            //     }

        });
        calendar.render();
    });

    function showEventDialog(title,details) {
        // alert('Event: ' + title + '\n' + 'URL :' + details )

    }

    // 予定の取得
    function getEventDates() {

        // specialDayにControllerから渡した配列が入る
        const data = {specialDay: specialDay};

        // googleカレンダー用のURLを発行
        // const google_url = {url: googleUrl};

        // const ary = data.specialDay.map(function(value){
        //     return {title:value.schedule,start:value.start_date,end:value.end_date};
        // })

        return data.specialDay;
    };

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
        <div class="flex px-6">

            <div class="w-1/4 max-w-xs">
                <div class="bg-gray-100">
                    <form method="POST" action="{{ route('test.add') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 ml-4">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 text-xl font-bold mb-2">予定を入力する</label>
                                <input
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                    id="schedule"
                                    name="schedule"
                                    {{-- value="{{ old('schedule_title') }}" --}}
                                    type="text"
                                    placeholder="ここに予定を入れてください">

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
            <div class="bg-white-400 w-3/4">
                <div class="" id='calendar'></div>
            </div>

        @include ('footer')
        </div>

        <!-- Small Modal -->
        <div id="small-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex justify-between items-center p-5 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                            Small modal
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="small-modal">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-6 space-y-6">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button data-modal-toggle="small-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                        <button data-modal-toggle="small-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- ここからモーダル表示部分として追記 -->
        {{-- <div id="calendarModal" class="modal fade">
            <div class="modal-dialog modal-dialog-center">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">close</span>
                        </button>
                        <span id="modalTitle" class="modal-title"></span>
                    </div>
                    <div id="modalBody" class="modal-body"></div>
                    <div id="modalFooter" class="modal-footer"></div>
                </div>
            </div>
        </div> --}}
        <!-- ここまでモーダル追加部分で追記しました -->
    </x-app-layout>
  </body>
</html>
