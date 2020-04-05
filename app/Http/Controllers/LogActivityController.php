<?php

namespace App\Http\Controllers;

use App\LogActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogActivityController extends Controller
{
    public static function addToLog(Request $request)
    {
        $log = new LogActivity();
        $log->subject = $request->subject;
        $log->url  = $request->fullUrl();
        $log->method  = $request->method();
        $log->ip  = $request->ip();
        $log->agent  = $request->header('user-agent');
        $log->user_id  = auth()->check() ? auth()->user()->id : 1;
        $log->save();

    }


    public static function activityLogView()
    {
        $datas = DB::table('log_activities')
            ->orderBy('id', 'DESC')
            ->get();
        $breadcrumb ="Activity Log";
        return view('admin.logView',[
            'logs' => $datas,'breadcrumb'=>$breadcrumb
        ]);
    }
}
