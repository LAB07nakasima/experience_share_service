import { Calendar } from '@fullcalendar/core';
import dayGridPlugin from '@fullcalendar/daygrid';
import timeGridPlugin from '@fullcalendar/timegrid';
import listPlugin from '@fullcalendar/list';

var calendarEl = document.getElementById("calendar");

console.log('calender.js');

let calendar = new Calendar(calendarEl, {
    plugins: [ dayGridPlugin, timeGridPlugin, listPlugin ],
    initialView: 'dayGridMonth',
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,listWeek'
    },
    locale: "ja",

    // テスト
    selectable: true,
    select: function (info) {
        //alert("selected " + info.startStr + " to " + info.endStr);

    // 入力ダイアログ
    const eventName = prompt("イベントを入力してください");

        if (eventName) {
            // Laravelの登録処理の呼び出し
            axios
                .post("/schedule-add", {
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                    event_name: eventName,
                })
                .then(() => {
                    // イベントの追加
                    calendar.addEvent({
                        schedule: eventName,
                        start_date: info.start,
                        end_date: info.end,
                        allDay: true,
                    });
                })
                .catch(() => {
                    // バリデーションエラーなど
                    alert("登録に失敗しました");
                });
        }
    },

});
calendar.render();

