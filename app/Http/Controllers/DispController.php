<?php

namespace App\Http\Controllers;
use App\Models\Worktime;

class DispController extends Controller
{
    public function disp()
    {
        $worktimes = Worktime::all();
        return view('index', ['worktimes'=>$worktimes]);
    }

}
