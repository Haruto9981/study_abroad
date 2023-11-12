<x-app-layout>
    <body>
        <br>
        <h1  class="text-4xl pl-24 font-medium">My records</h1>
        <div class="px-24 mt-10">
            <div class="calendar_area">
                <div class="flex justify-between calendar_header">
                    <p class="font-medium text-3xl" id="year_month_label"></p>
                    <div>
                        <button class="mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" id="prev_month_btn" onClick="prev_month()">Last Month</button>
                        <button class="mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" id="now_btn" onClick="now_month()">Now</button>
                        <button class="mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" id="next_month_btn" onClick="next_month()">Next Month</button>
                    </div>
                </div>
                <div class="flex justify-between mt-6">
                    <div>
                        <p class="font-medium text-2xl text-orange-400">Diary Calendar Records</p>
                        <div id="diary_calendar_body"></div>
                        <p class="flex justify-end font-black text-2xl mt-2 text-orange-400" id="count_diary_written_label"></p>
                    </div>
                    <div>
                        <p class="font-medium text-2xl text-yellow-400">Expression Calendar Records</p>
                        <div id="expression_calendar_body"></div>
                        <p class="flex justify-end font-black text-2xl mt-2 text-yellow-400" id="count_expression_written_label"></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-24 py-10">
            <div class="period mb-10">
              <p class="font-medium text-3xl mb-10">Diary Word Count Records</p>
              From <input type="text" class="form-control d-inline-block datepicker" style="width:150px;" id="date-start">
              To <input type="text" class="form-control d-inline-block datepicker mr-4" style="width:150px;" id="date-end">
              <button type="button" class="btn btn-outline-primary mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" data-mode="1w">a week</button>
              <button type="button" class="btn btn-outline-primary active mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" data-mode="1m">a month</button>
              <button type="button" class="btn btn-outline-primary mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" data-mode="6m">6 months</button>
              <button type="button" class="btn btn-outline-primary mx-2 rounded text-white font-bold  bg-orange-300 hover:bg-orange-400 px-2 py-1" data-mode="1y">a year</button>
            </div>
            <canvas id="myChart"></canvas>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </div>
        <script>
            const diaries = @json($my_diaries);
            const expressions = @json($my_expressions);
            
            let diary_array = [];
            for(i=0; i < diaries.length; i++) {

                let diary_created_at = new Date(diaries[i].created_at);
            
                function formatDiaryDate() {
                        let y = diary_created_at.getFullYear();
                        let month = diary_created_at.getMonth() + 1;
                        let m = ('00' + month).slice(-2);
                        let d = ('00' + diary_created_at.getDate()).slice(-2);
                        return (y + '-' + m + '-' + d);
                    }
                
                var formated_diary_created_at = formatDiaryDate();
                
                diary_array.push(formated_diary_created_at);
            }
            
            let expression_array = [];
            for(i=0; i < expressions.length; i++) {

                let expression_created_at = new Date(expressions[i].created_at);
                
                function formatExpressionDate() {
                        let y = expression_created_at.getFullYear();
                        let month = expression_created_at.getMonth() + 1;
                        let m = ('00' + month).slice(-2);
                        let d = ('00' + expression_created_at.getDate()).slice(-2);
                        return (y + '-' + m + '-' + d);
                    }
                
                var formated_expression_created_at = formatExpressionDate();
                
                expression_array.push(formated_expression_created_at);
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
                            _html += '<td class="with_date" style="background-color: #ffddbc; font-weight: bold">' + countDay + '</td>';
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
                            _html += '<td class="with_date" style="background-color: #ffddbc; font-weight: bold">' + countDay + '</td>';
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
                            _html += '<td class="with_date" style="background-color: #ffffbc; font-weight: bold">' + countDay + '</td>';
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
                            _html += '<td class="with_date" style="background-color: #ffffbc; font-weight: bold">' + countDay + '</td>';
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
          
            let startDate = today.setDate(today.getDate() - 7);
            let endDate = new Date();
            let myChart;
            
            $('.datepicker').datepicker({
              dateFormat: 'yy/mm/dd',
              onSelect: function(dateText, inst){
                if( $(this).attr('id') == 'date-start') {
                    startDate = new Date(dateText);
                    if (myChart) {
                      myChart.destroy();
                    }
                    drawMyChart();
                } else {
                  endDate = new Date(dateText);
                  if (myChart) {
                    myChart.destroy();
                  }
                  drawMyChart();
                }
              }
            });
          
           $('.period .btn').click(function(event) {
              if( !$(this).hasClass('active') ) {
                $('.period .btn').removeClass('active');
                $(this).addClass('active');
                var dt = new Date();
                var minDate = '';
         
                switch ($(this).data('mode')) {
                  case '1w':
                    date_min = dt.setDate(dt.getDate() - 7);
                    break;
                  case '1m':
                    date_min = dt.setMonth(dt.getMonth() - 1);
                    break;
                  case '6m':
                    date_min = dt.setMonth(dt.getMonth() - 6);
                    break;
                  case '1y':
                    date_min = dt.setYear(dt.getFullYear() - 1);
                    break;
                }
                startDate = new Date(date_min);
                endDate = new Date();
                if (myChart) {
                    myChart.destroy();
                }
                drawMyChart();
              }
            });
        
        function drawMyChart() {
          
            function formatDate(date) {
              const year = date.getFullYear();
              const month = String(date.getMonth() + 1).padStart(2, '0');
              const day = String(date.getDate()).padStart(2, '0');
              return `${year}-${month}-${day}`;
            }
            
            function getDates(startDate, endDate) {
              const dateArray = [];
              let currentDate = new Date(startDate);
            
              while (currentDate <= endDate) {
                dateArray.push(formatDate(currentDate));
                currentDate.setDate(currentDate.getDate() + 1);
              }
            
              return dateArray;
            }
           
            let result = getDates(startDate, endDate);
            
            let wordCount = [];
          
            for(i=0; i < result.length; i++) {
                if(~diary_date.indexOf(result[i])) {
                    
                    wordCount[i] = getDateWordCount(result[i]);
                    
                } else {
                    wordCount[i] = 0;
                }
            }
            
            function getDateWordCount(date_diary) {
                
                let dateWordCount = 0;
                
                for(j=0; j < diaries.length; j++) {
                    
                    let diary_created_at = new Date(diaries[j].created_at);
            
                    function formatDiaryDate() {
                            let y = diary_created_at.getFullYear();
                            let month = diary_created_at.getMonth() + 1;
                            let m = ('00' + month).slice(-2);
                            let d = ('00' + diary_created_at.getDate()).slice(-2);
                            return (y + '-' + m + '-' + d);
                        }
                    
                    var formated_diary_created_at = formatDiaryDate();
                    
                    if(formated_diary_created_at == date_diary) {
                        dateWordCount += Number(diaries[j].word_count);
                    }
                }
                
                return dateWordCount
            }
            
            const ctx = document.getElementById("myChart").getContext("2d");
            
            myChart = new Chart(ctx, {
                type: "bar",
                data: {
                    labels: result,
                    datasets: [
                        {
                            label: "My Diary Word Count",
                            data: wordCount,
                            backgroundColor: "rgba(255, 206, 86, 0.2)",
                            borderColor: "rgba(255, 206, 86, 1)",
                            borderWidth: 1,
                        },
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
            
        }
           
        drawMyChart();   
        </script>
    </body>
 </x-app-layout>
