<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;
use Illuminate\Support\Facades\Auth;
use DateTime;
use App\Models\User;

class ScheduleController extends Controller
{
    
    public function show()
    {
        $user = Auth::user();
        $datetime = new DateTime($user->profile->end_date);
        $current  = new DateTime('now');
        $diff     = $current->diff($datetime);
        return view('calendar.calendar')->with(['diff' => $diff]);
    }

    
    public function scheduleAdd(Request $request)
    {
        
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer',
            'event_name' => 'required|max:50',
        ]);

       
        $schedule = new Schedule;
        $schedule->start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $schedule->end_date = date('Y-m-d', $request->input('end_date') / 1000);
        $schedule->event_name = $request->input('event_name');
        $schedule->user_id = \Auth::id();
        $schedule->save();

        return $schedule;
    }
    
    public function scheduleGet(Request $request, Schedule $schedule)
    {
        
        $request->validate([
            'start_date' => 'required|integer',
            'end_date' => 'required|integer'
        ]);

        
        $start_date = date('Y-m-d', $request->input('start_date') / 1000);
        $end_date = date('Y-m-d', $request->input('end_date') / 1000);
      
        $schedule = $schedule->getIndividualSchedule();
        
        return $schedule->select(
                'id',
                'start_date as start',
                'end_date as end',
                'event_name as title',
                
            )
            
            ->where('end_date', '>', $start_date)
            ->where('start_date', '<', $end_date)
            ->get();
    }
    
    public function scheduleDelete($id)
    {
        $schedule = Schedule::find($id);
    
        $schedule->delete();
        return;
    }
}