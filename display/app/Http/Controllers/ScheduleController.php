<?php

namespace App\Http\Controllers;

use App\Models\WeeklySchedule;
use App\Models\Group;
use App\Models\Matakuliah;
use App\Models\Dosen;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function display()
    {
        $today = Carbon::today()->toDateString(); // Get today's date

        // Query the schedule for the current day
        $schedules = WeeklySchedule::with('group', 'matakuliah', 'dosen', 'kelas')
            ->whereDate('start_time', '<=', $today)
            ->whereDate('end_time', '>=', $today)
            ->limit(8)  // Limit to 8 items
            ->get();

        return view('display', compact('schedules'));
    }
}