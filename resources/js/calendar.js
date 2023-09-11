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
        right: "dayGridMonth",
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
                .then((response) => {
                    calendar.addEvent({
                        id: response.data.id,
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
                
                alert("Failed to register");
            });
    },
　　
　　eventClick: function (info) {
    
    if (confirm("Do you want to delete this event?")) {
        const eventId = info.event.id;
        axios
            .delete("/schedule-delete/" + eventId)
            .then(() => {
                info.event.remove();
            })
            .catch(() => {
                alert("Failed to delete");
            });
    }
},
    
   
});
calendar.render();