<x-app-layout>
    <body>
        <br>
        <h1  class="text-4xl pl-24 font-medium">My records</h1>
        <div class="px-24 mt-10">
            <div class="calendar_area">
                <div class="flex justify-between calendar_header">
                    <p class="font-black text-3xl text-orange-500" id="year_month_label"></p>
                    <div>
                        <button class="mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" id="prev_month_btn" onClick="prev_month()">Last Month</button>
                        <button class="mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" id="now_btn" onClick="now_month()">Now</button>
                        <button class="mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" id="next_month_btn" onClick="next_month()">Next Month</button>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <div>
                        <p class="font-medium text-2xl text-green-700">Diary Calendar Records</p>
                        <div id="diary_calendar_body"></div>
                        <p class="flex justify-end font-black text-2xl text-green-700 mt-2" id="count_diary_written_label"></p>
                    </div>
                    <div>
                        <p class="font-medium text-2xl text-lime-500">Expression Calendar Records</p>
                        <div id="expression_calendar_body"></div>
                        <p class="flex justify-end font-black text-2xl text-lime-500 mt-2" id="count_expression_written_label"></p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            const diaries = @json($my_diaries);
            const expressions = @json($my_expressions);
            
            let diary_array = [];
            for(i=0; i < diaries.length; i++) {

                let diary_updated_at = new Date(diaries[i].updated_at);
                
                function formatDiaryDate() {
                        let y = diary_updated_at.getFullYear();
                        let month = diary_updated_at.getMonth() + 1;
                        let m = ('00' + month).slice(-2);
                        let d = ('00' + diary_updated_at.getDate()).slice(-2);
                        return (y + '-' + m + '-' + d);
                    }
                
                var formated_diary_updated_at = formatDiaryDate();
                
                diary_array.push(formated_diary_updated_at);
            }
            
            let expression_array = [];
            for(i=0; i < expressions.length; i++) {

                let expression_updated_at = new Date(expressions[i].updated_at);
                
                function formatExpressionDate() {
                        let y = expression_updated_at.getFullYear();
                        let month = expression_updated_at.getMonth() + 1;
                        let m = ('00' + month).slice(-2);
                        let d = ('00' + expression_updated_at.getDate()).slice(-2);
                        return (y + '-' + m + '-' + d);
                    }
                
                var formated_expression_updated_at = formatExpressionDate();
                
                expression_array.push(formated_expression_updated_at);
            }
            
            let diary_date = diary_array.join();
            let expression_date = expression_array.join();
            
            const week = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
    
            var today = new Date();
            var showDate = new Date(today.getFullYear(), today.getMonth(), 1);
        
            window.onload = function () {
                showCalendar(showDate);
            };
        
            function showCalendar(date) {
        
                var year = date.getFullYear();
                var month = date.getMonth() + 1;
                
                switch(month) {
                    case 1: 
                        var showDateStr = "January" + " " + year;
                        break;
                    case 2: 
                        var showDateStr = "February" + " " + year;
                        break;
                    case 3:
                        var showDateStr = "March" + " " + year;
                        break;
                    case 4: 
                        var showDateStr = "April" + " " + year;
                        break;
                    case 5: 
                        var showDateStr = "May" + " " + year;
                        break;
                    case 6: 
                        var showDateStr = "June" + " " + year;
                        break;
                    case 7: 
                        var showDateStr = "July" + " " + year;
                        break;
                    case 8: 
                        var showDateStr = "August" + " " + year;
                        break;
                    case 9:
                        var showDateStr = "September" + " " + year;
                        break;
                    case 10: 
                        var showDateStr = "October" + " " + year;
                        break;
                    case 11: 
                        var showDateStr = "November" + " " + year;
                        break;
                    case 12: 
                        var showDateStr = "December" + " " + year;
                        break;
                }
                
            
                document.querySelector('#year_month_label').innerHTML = showDateStr;
                
                var DiaryCalendarTable = createDiaryCalendarTable(year, month);
                document.querySelector('#diary_calendar_body').innerHTML = DiaryCalendarTable;
            
                var ExpressionCalendarTable = createExpressionCalendarTable(year, month);
                document.querySelector('#expression_calendar_body').innerHTML = ExpressionCalendarTable;
            }
            
            function createDiaryCalendarTable(year, month) {

                var _html = '';
                _html += '<table class="calendar_tbl">';
                
                _html += '<tr>';
                for (var i = 0; i < week.length; i++) {
                  _html += "<th>" + week[i] + "</th>";
                }
                _html += '</tr>';
                
                var startDayOfWeek = new Date(year, month - 1, 1).getDay();
                
                var countDay = 0;
                
                var countMonthDiary = 0;
                
                var monthOfEndDay = new Date(year, month, 0).getDate()
        
                for (var i = 0; i < 6; i++) {
                  _html += '<tr>';
                
                  for (var j = 0; j < week.length; j++) {
                    if (i == 0 && j == startDayOfWeek) {
                      // 日付+1していく
                      countDay++;
                      
                      function formatDate() {
                        var y = year;
                        var m = ('00' + month).slice(-2);
                        var d = ('00' + countDay).slice(-2); 
                        return (y + '-' + m + '-' + d);
                      }
                      
                      var calendar_date = formatDate();
                     
                        if(~diary_date.indexOf(calendar_date)) {
                             countMonthDiary++;
                            _html += '<td class="with_date" style="background-color: #3cb371; font-weight: bold">' + countDay + '</td>';
                        } else {
                            _html += '<td class="with_date">' + countDay + '</td>';
                        }
                    }
                    // 日付が0以外で、日付が末日より小さい場合
                    else if (countDay != 0 && countDay < monthOfEndDay) {
                      // 日付+1
                      countDay++;
        
                      function formatDate() {
                        var y = year;
                        var m = ('00' + month).slice(-2);
                        var d = ('00' + countDay).slice(-2); 
                        return (y + '-' + m + '-' + d);
                      }
                      
                      var calendar_date = formatDate();
                     
                        if(~diary_date.indexOf(calendar_date)) {
                             countMonthDiary++;
                            _html += '<td class="with_date" style="background-color: #3cb371; font-weight: bold">' + countDay + '</td>';
                        } else {
                            _html += '<td class="with_date">' + countDay + '</td>';
                        }
                    }   
                    else {
                      _html += '<td class="no_date"></td>';
                    }
                  }
                  _html += '</tr>';
                }
                _html += '</table>';
                
                document.querySelector('#count_diary_written_label').innerHTML = "Diary Records: " + countMonthDiary + "/" + monthOfEndDay + " Days";
                return _html;
            }
            
            function createExpressionCalendarTable(year, month) {

                var _html = '';
                _html += '<table class="calendar_tbl">';
                
                _html += '<tr>';
                for (var i = 0; i < week.length; i++) {
                  _html += "<th>" + week[i] + "</th>";
                }
                _html += '</tr>';
                
                var startDayOfWeek = new Date(year, month - 1, 1).getDay();
                
                var countDay = 0;
                
                var countMonthExpression = 0;
                
                var monthOfEndDay = new Date(year, month, 0).getDate()
        
                for (var i = 0; i < 6; i++) {
                  _html += '<tr>';
                
                  for (var j = 0; j < week.length; j++) {
                    if (i == 0 && j == startDayOfWeek) {
                      // 日付+1していく
                      countDay++;
                      
                      function formatDate() {
                        var y = year;
                        var m = ('00' + month).slice(-2);
                        var d = ('00' + countDay).slice(-2); 
                        return (y + '-' + m + '-' + d);
                      }
                      
                      var calendar_date = formatDate();
                     
                        if(~expression_date.indexOf(calendar_date)) {
                             countMonthExpression++;
                            _html += '<td class="with_date" style="background-color: #99ff33; font-weight: bold">' + countDay + '</td>';
                        } else {
                            _html += '<td class="with_date">' + countDay + '</td>';
                        }
                    }
                    // 日付が0以外で、日付が末日より小さい場合
                    else if (countDay != 0 && countDay < monthOfEndDay) {
                      // 日付+1
                      countDay++;
        
                      function formatDate() {
                        var y = year;
                        var m = ('00' + month).slice(-2);
                        var d = ('00' + countDay).slice(-2); 
                        return (y + '-' + m + '-' + d);
                      }
                      
                      var calendar_date = formatDate();
                     
                        if(~expression_date.indexOf(calendar_date)) {
                             countMonthExpression++;
                            _html += '<td class="with_date" style="background-color: #99ff33; font-weight: bold">' + countDay + '</td>';
                        } else {
                            _html += '<td class="with_date">' + countDay + '</td>';
                        }
                    }   
                    else {
                      _html += '<td class="no_date"></td>';
                    }
                  }
                  _html += '</tr>';
                }
                _html += '</table>';
                
                document.querySelector('#count_expression_written_label').innerHTML = "Expression Records: " + countMonthExpression + "/" + monthOfEndDay + " Days";
                return _html;
            }
          
          function prev_month() {
            // 表示用の日付の月-1を設定
            showDate.setMonth(showDate.getMonth() - 1);
            // カレンダーの表示（引数には表示用の日付を設定）
            showCalendar(showDate);
          }
    
          function now_month() {
            // 表示用の日付に今日の日付を設定
            showDate = new Date();
            // カレンダーの表示（引数には表示用の日付を設定）
            showCalendar(showDate);
          }
    
          function next_month() {
            // 表示用の日付の月+1を設定
            showDate.setMonth(showDate.getMonth() + 1);
            // カレンダーの表示（引数には表示用の日付を設定）
            showCalendar(showDate);
          }
            
        </script>
    </body>
 </x-app-layout>
