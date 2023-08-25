import { Calendar } from "@fullcalendar/core";
import interactionPlugin from "@fullcalendar/interaction";
import dayGridPlugin from "@fullcalendar/daygrid";
import axios from 'axios';

var calendarEl = document.getElementById("calendar");

let calendar = new Calendar(calendarEl, {
    plugins: [interactionPlugin, dayGridPlugin],
    initialView: "dayGridMonth",
    headerToolbar: {
        left: "prev,next today",
        center: "title",
        right: "dayGridMonth,timeGridWeek,listWeek",
    },
    height: 'auto',
    
   

    
    selectable: true,
    select: function (info) {
       
        const eventName = prompt("Fill in your event");

        if (eventName) {
           
            axios
                .post("/schedule-add", {
                    start_date: info.start.valueOf(),
                    end_date: info.end.valueOf(),
                    event_name: eventName,
                })
                .then(() => {
                    
                    calendar.addEvent({
                        title: eventName,
                        start: info.start,
                        end: info.end,
                        allDay: true,
                    });
                })
                .catch(() => {
                   
                    alert("Failed to register");
                });
        }
    },
    
    events: function (info, successCallback, failureCallback) {
        
        axios
            .post("/schedule-get", {
                start_date: info.start.valueOf(),
                end_date: info.end.valueOf(),
            })
            .then((response) => {
                
                calendar.removeAllEvents();
              
                successCallback(response.data);
            })
            .catch(() => {
                
                alert("登録に失敗しました");
            });
    },
});
calendar.render();