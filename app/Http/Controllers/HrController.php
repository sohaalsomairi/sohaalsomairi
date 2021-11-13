<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\emps;
use App\Models\attendance;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HrController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test(Request $r){

         $emps = emps::all();
         $msg='';

             if(Auth::user()->superuser == 1)
             {
                return view('hr',['title'=>'الصفحة الرئيسية' ,'emps'=>$emps,'msg'=>$msg]);
             }
             else{
                 return view('profile',['title'=>'الصفحة الرئيسية' ,'emps'=>$emps,'msg'=>$msg]);
             }
    }



     public function attendance(){
         $emps = emps::all();
         if($emps)
         {
             return view('hr',['title'=>'حضور وغياب الموظفين' ,'emps'=>$emps]);
         }
     }

     public function empattendance(Request $r){
         $emps=[];
         $emp = emps::where('empnum',$r->empid)->get()->first();

             return view('hr',['title'=>'الصفحة الرئيسية' ,'emps'=>$emps,'emp'=>$emp]);


     }

     public function attendancestatistics(){
         $emps = emps::whereHas('attendance',function($q){
            $q->where('attendance_date',substr(Carbon::now(),0,10));
         })->get();
         $empsno = emps::whereDoesntHave('attendance',function($q){
            $q->where('attendance_date',substr(Carbon::now(),0,10));
         })->get();
         $now = substr(Carbon::now(),0,10);
         $allemps = emps::all()->count();
         return view('attendchart',['title'=>'إحصائية بحضور وغياب الموظفين' ,'present'=>$emps ,'absent'=>$empsno ,'date'=>$now ,'allemps'=>$allemps]);
     }


     public function attendancestatisticsperdate(Request $r){
         $now = $r->attenddate;
         $emps = emps::whereHas('attendance',function($q) use ($now) {
            $q->where('attendance_date',$now);
         })->get();
         $empsno = emps::whereDoesntHave('attendance',function($q) use ($now) {
            $q->where('attendance_date',$now);
         })->get();
         $allemps = emps::all()->count();
         return view('attendchart',['title'=>'إحصائية بحضور وغياب الموظفين' ,'present'=>$emps ,'absent'=>$empsno ,'date'=>$now ,'allemps'=>$allemps]);
     }

     public function changePassword(Request $r){
         $user = User::find(Auth::user()->id);
         if($user && ($r->newpassword == $r->confirmpassword)){
          $user->password = Hash::make($r->newpassword);
         }
         else{
             return redirect()->back()->with(['msg'=>'يجب ان تكون الكلمتان متطابقتان !']);
         }
     }


}
