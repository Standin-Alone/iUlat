<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TReport;
use DB;
class VerifyController extends Controller
{
    //

    public function index()
    {

                 $DisplayData=DB::table('v_validatedreports')->where('Status','<>','Solved')->get();

                  return view('officials.verify',compact('DisplayData'));
    }
}
