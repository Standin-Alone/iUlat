<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TReport;
use DB;
class ValidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function index()
    {
        //
    
                 $DisplayData=TReport::select('ReportCode',DB::raw("Case when IsAnonymous=1 then 'Anonymous' else FirstName end as FirstName"),DB::raw("Case when IsAnonymous=1 then '' else MiddleName end as MiddleName"),DB::raw("Case when IsAnonymous=1 then '' else LastName end as LastName"),'ReportDescription','ReportDate','ReportTypeDescription','ReportSubTypeDescription','R.ReportID')
                                    ->from('t_report as R')
                                    ->join('t_report_list as RL','R.ReportID','RL.ReportID')
                                    ->join('ss_report_type as rt','rt.reporttypeid','R.reportTypeID')
                                    ->join('ss_report_sub_type as rst','rst.reportsubtypeid','R.reportsubtypeID')
                                    ->join('ss_users as U','U.UserID','R.userID')
                                    ->join('ss_roles  as RS','RS.roleid','U.roleid')
                                    ->join('ss_branches as B','B.branchid','U.branchid')
                                   
                                    ->where('U.Status',"Active")
                                    ->where('BranchName',"Quezon City")
                                    ->where('ValidatedBy',null)
                                    ->where('VerifiedBy',null)
                                    ->where('R.status','!=',"Invalid Report")
                                    ->orwhere('R.userid',null)
                                    ->groupBy('ReportCode')
                                    ->groupBy('BranchName')->get();


        // select ReportCode,Case when IsAnonymous=1 then 'Anonymous' else FirstName end FirstName, Case when IsAnonymous=1 then '' else MiddleName end MiddleName,Case when IsAnonymous=1 then '' else LastName end LastName,ReportDescription,ReportDate,ReportTypeDescription,R.ReportID from t_report R inner join t_report_list RL on R.ReportID=RL.ReportID inner join ss_report_type rt on rt.reporttypeid=r.reportTypeID inner join ss_users U on U.UserID=R.userID inner join ss_roles RS on RS.roleid=U.roleid inner join ss_branches B on B.branchid=U.branchID and U.Status='Active' and BranchName='Quezon City' and ValidatedBy is null and VerifiedBy is null and R.status!='Invalid Report' or r.userid is null Group by  ReportCode, BranchName

        return view('middleman.validate',compact("DisplayData"));
      
    }


    public function list_of_validated_report()
    {


        return view('middleman.list_of_validated_reports');


    }

    public function list_of_invalid_report()
    {


        return view('middleman.list_of_invalid_reports');


    }






    //MIDDLEMAN CONTROLLER FUNCTIONS


    public function view()
    {
        //

        $Load_Report_Attachments= new TReport();
        $Load_Report_Attachments->load_report_attachments();

    }


    public function send_to_officials()
    {
        //

        $Send_To_Officials= new TReport();
        $Send_To_Officials->send_to_officials();

    }


    public function remove_invalid_report()
    {
        //

        $Remove_Invalid_Report= new TReport();
        $Remove_Invalid_Report->remove_invalid_report();

    }

    public function filter_validated_reports()
    {
        //

        $Generate_Validated_Reports= new TReport();
        $Generate_Validated_Reports->generate_list_of_validated_reports();

    }


     public function filter_invalid_reports()
    {
        //

        $Generate_Invalid_Reports= new TReport();
        $Generate_Invalid_Reports->generate_list_of_invalid_reports();

    }



}
