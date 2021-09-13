<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Worktime;

class EditController extends Controller
{
    public function edit(Request $request)
    {
        $current_day = Carbon::now()->format('Y/m/d');
        $worktimes_row = DB::table('worktimes')->where('day', $current_day)->first();

        if ($request->has('in')) {
            // 出勤
            if ($worktimes_row === null) {
                DB::table('worktimes')->insert([
                'day' => Carbon::now()->format('Y/m/d'),
                'in_time' => Carbon::now(),
                'work_status' => 1
                ]);
            }
        } else if ($request->has('out')){
            // 退勤
            if ($worktimes_row !== null && $worktimes_row->work_status === 1) {
                DB::table('worktimes')->where('day', $current_day)->update([
                    'out_time' => Carbon::now(),
                    'work_status' => 0
                ]);
            }
        }

        $worktimes = Worktime::all();
        return view('index', ['worktimes'=>$worktimes]);
    }
}
