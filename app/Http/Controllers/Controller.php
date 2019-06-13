<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\TReport;
use App\Models\SsUser;
use DB;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function index()
    {
    	return view('main.base');

    }

    public function login()
    {
        return view('login');

    }
      public function dashboard()
    {

        $CountTagaUlat= DB::table('v_users_nd')->where('RoleDescription','Taga-ulat')->count();
        $CountReports= DB::table('t_report')->count();
        return view('dashboard',compact('CountTagaUlat'),compact('CountReports'));


    }

    public function countonhold()
    {

    	$count= new TReport();
    	$count->count_number_of_days_unprocess();
    	
    }

      public function edit_account()
    {

        $EditAccount = new SsUser();
        $EditAccount->edit_my_account();
        
    }

      public function sign_in()
    {

        $sign_in= new SsUser();
        $sign_in->sign_in();
        
    }

    public function sign_out()
    {
            session()->flush();
            // session('session_userid');
            // session('session_first_name');
            // session('session_middle_name');
            // session('session_last_name');
            // session('session_contact');
            // session('session_email');
            // session('session_position');

            return redirect()->route('Login');
        
    }


    


}
