<x-app-layout>
     <body>
          <br>
          <h1  class="text-4xl pl-24 font-medium">Posts</h1>
           <div class="my-10">
                <form class="inline-block pl-24" method="GET" action="{{ route('home_expression') }}">
                    @csrf
                    
                    <select name="country" class="rounded-3xl mr-2">
                        <option value="">Choose country</option>
                        <option value="USA 🇺🇸" {{ old('country', $country) == 'USA 🇺🇸' ? 'selected' : ''}}>USA</option>
                        <option value="UK 🇬🇧" {{ old('country', $country) == 'UK 🇬🇧' ? 'selected' : ''}}>UK</option>
                        <option value="Australia 🇦🇺" {{ old('country', $country) == 'Australia 🇦🇺' ? 'selected' : ''}}>Australia</option>
                        <option value="NewZealand 🇳🇿" {{ old('country', $country) == 'NewZealand 🇳🇿' ? 'selected' : ''}}>NewZealand</option>
                        <option value="Canada 🇨🇦" {{ old('country', $country) == 'Canada 🇨🇦' ? 'selected' : ''}}>Canada</option>
                        <option value="Germany 🇩🇪" {{ old('country', $country) == 'Germany 🇩🇪' ? 'selected' : ''}}>Germany</option>
                        <option value="Francse 🇫🇷" {{ old('country', $country) == 'France 🇫🇷' ? 'selected' : ''}}>France</option>
                        <option value="Taiwan 🇹🇼" {{ old('country', $country) == 'Taiwan 🇹🇼' ? 'selected' : ''}}>Taiwan</option>
                        <option value="China 🇨🇳" {{ old('country', $country) == 'China 🇨🇳' ? 'selected' : ''}}>China</option>
                    </select>
                   
                    <input class="rounded-xl mr-2" type="search" name="region" placeholder="Region" value="@if (isset($region)) {{ $region }} @endif">
                    
                    <input class="rounded-lg text-white font-bold  bg-orange-300 hover:bg-orange-400 px-4 py-2" type="submit" value="search">
                </form>
                
                <div class="inline-block ml-2">
                    <button onclick="location.href='/expressions/home_expression'" class="rounded-2xl text-white font-bold bg-gray-300 hover:bg-gray-400 px-2 py-1">Clear</button>
                </div>
            </div>
          <div class="flex justify-center pr-36">
            <button onclick="location.href='/diaries/home_diary'" id="expressions-button" class="rounded-lg text-white font-bold bg-orange-300 hover:bg-orange-400 px-4 py-2">Diaries</button>
          </div>
          <div class="container px-5 pb-10 mx-auto flex">
            <div class="lg:w-1/2 w-full mb-10 lg:mb-0" >
                @foreach ($public_expressions as $expression)
                    <div class="flex flex-wrap my-16 border border-black rounded-3xl">
                      <div class="p-6 flex flex-col items-start  w-full">
                          <div class="flex border-b border-black pb-4  w-full">
                             <div>
                                <a href="/profile/{{$expression->user->id}}" class="inline-flex items-center">
                                  <img alt="blog" src="{{ $expression->user->profile->profile_image_url }}" class="w-16 h-16 rounded-full flex-shrink-0 object-cover object-center">
                                  <span class="flex-grow flex flex-col pl-4">
                                    <span class="title-font text-lg text-gray-900">{{$expression->user->name}} </span>
                                    <span class="title-font font-medium text-gray-900">[{{$expression->user->profile->country}}]</span>
                                    <span class="text-blue-600 text-xs tracking-widest mt-0.5">{{$expression->updated_at}}</span>
                                  </span>
                                </a>  
                              </div>
                              <div class="pl-52 pt-2">
                                <a href="/profile/{{$expression->user->id}}/map/?region={{$expression->user->profile->region}}&country={{$expression->user->profile->country}}">
                                    <h2 class="bg-orange-400 hover:bg-orange-300 text-white font-bold rounded px-4 py-2">{{$expression->user->profile->region}}</h2>
                                </a>
                              </div>  
                          </div>
                        <div>
                            <h2 class="sm:text-3xl text-2xl title-font font-medium text-gray-900 mt-2 mb-4">{{$expression->vocabulary}}</h2>
                            <p class="leading-relaxed mb-4 text-xl">Meaning: <span class="font-bold">{{$expression->meaning}}</span></p>
                            <p class="leading-relaxed mb-4 text-xl">Example: {{$expression->example}}</p>
                        </div>
                        <div class="flex items-center flex-wrap border-t border-black mt-auto w-full">
                          <span class=" inline-flex items-center ml-auto leading-none pr-3 py-1 mt-4">
                            <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                @if($expression->users()->where('user_id', Auth::user()->id)->exists())
                                    <div>
                                        <form action="{{route('expression_unlikes', $expression)}}" method="POST">
                                            @csrf
                                            <button type="submit">
                                                 <i class="fa-solid fa-heart fa-lg fa-xl" style="color: #ff3300;"></i>
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div>
                                        <form action="{{route('expression_likes', $expression)}}" method="POST">
                                            @csrf
                                            <button type="submit">
                                               <i class="fa-regular fa-heart fa-lg fa-xl" style="color: #ff3300;"></i>
                                            </button>
                                        </form>
                                    </div>
                                @endif
                                <div class="pl-2">
                                    <p>{{$expression->users()->count()}} likes</p>
                                </div>  
                            </svg>
                          </span>
                        </div>
                      </div>
                    </div>
                @endforeach
                @if($public_expressions != false)
                    <div class='paginate'>
                        {{ $public_expressions->links() }}
                    </div>
                @endif
            </div>
            <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12">
            <a  href="/record">
                <h1 class="font-medium text-3xl text-center">Expression Calendar Records</h1>
            </a>
            <br>
            <div class="calendar_area">
                <div class="flex justify-between calendar_header">
                    <p class="font-black text-3xl text-yellow-400" id="year_month_label"></p>
                    <div>
                        <button class="mx-2 rounded text-white font-bold  bg-yellow-300 hover:bg-yellow-400 px-2 py-1" id="prev_month_btn" onClick="prev_month()">Last Month</button>
                        <button class="mx-2 rounded text-white font-bold  bg-yellow-300 hover:bg-yellow-400 px-2 py-1" id="now_btn" onClick="now_month()">Now</button>
                        <button class="mx-2 rounded text-white font-bold  bg-yellow-300 hover:bg-yellow-400 px-2 py-1" id="next_month_btn" onClick="next_month()">Next Month</button>
                    </div>
                </div>
                <div id="calendar_body"></div>
                <p class="flex justify-end font-black text-2xl text-yellow-400" id="count_expression_written_label"></p>
            </div>
            <br>
            <div class="text-4xl text-center">
                <!-- 留学開始日が現在よりも未来である場合 -->
                @if ($diff2->invert === 0)
                    <h2><span class="text-red-500 font-bold">{{ $diff2->format('%a') + 1 }} days</span> to the start of your SA!</h2>
                    
                <!-- 留学終了日が現在よりも過去である場合 -->
                @elseif ($diff1->invert === 1)
                    <h2 class="text-red-500 font-bold">Your SA is already over!</h2>
                    
                <!-- 上記以外 -->
                @else
                    <h2><span class="text-red-500 font-bold">{{ $diff1->format('%a') + 1 }} days</span> left to the end of your SA!</h2>
                @endif
            </div>
           </div>
          </div>
        <script>
            const expressions = @json($my_expressions);
            
            let array = [];
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
                
                array.push(formated_expression_created_at);
            }
            
            let expression_date = array.join();
            
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
            
                var calendarTable = createCalendarTable(year, month);
                document.querySelector('#calendar_body').innerHTML = calendarTable;
            }
            
            function createCalendarTable(year, month) {

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
                            _html += '<td class="with_date" style="background-color:  #ffffbc; font-weight: bold">' + countDay + '</td>';
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
                            _html += '<td class="with_date" style="background-color:  #ffffbc; font-weight: bold">' + countDay + '</td>';
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
