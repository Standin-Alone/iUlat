<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;
use Carbon\Carbon;
use Reliese\Database\Eloquent\Model as Eloquent;
use DB;
/**
 * Class TReport
 * 
 * @property int $ReportID
 * @property string $ReportCode
 * @property string $ReportDescription
 * @property string $Status
 * @property int $userID
 * @property \Carbon\Carbon $ReportDate
 * @property int $ValidatedBy
 * @property int $VerifiedBy
 * @property bool $IsVerfiedByAll
 * @property float $GivenPoints
 * @property string $Remark
 * @property int $ReportTypeID
 * @property bool $IsAnonymous
 * 
 * @property \App\Models\SsReportType $ss_report_type
 * @property \App\Models\SsUser $ss_user
 * @property \Illuminate\Database\Eloquent\Collection $ss_remarks
 * @property \Illuminate\Database\Eloquent\Collection $t_report_lists
 *
 * @package App\Models
 */
class TReport extends Eloquent
{
	protected $table = 't_report';
	
	protected $primaryKey = 'ReportID';
	public $timestamps = false;

	protected $casts = [
		'userID' => 'int',
		'ValidatedBy' => 'int',
		'VerifiedBy' => 'int',
		'IsVerfiedByAll' => 'bool',
		'GivenPoints' => 'float',
		'ReportTypeID' => 'int',
		'IsAnonymous' => 'bool'
	];

	protected $dates = [
		'ReportDate'
	];

	protected $fillable = [
		'ReportCode',
		'ReportDescription',
		'Status',
		'userID',
		'ReportDate',
		'ValidatedBy',
		'VerifiedBy',
		'IsVerfiedByAll',
		'GivenPoints',
		'Remark',
		'ReportTypeID',
		'IsAnonymous'
	];

	public function ss_report_type()
	{
		return $this->belongsTo(\App\Models\SsReportType::class, 'ReportTypeID');
	}

	public function ss_user()
	{
		return $this->belongsTo(\App\Models\SsUser::class, 'VerifiedBy');
	}

	public function ss_remarks()
	{
		return $this->hasMany(\App\Models\SsRemark::class, 'ReportID');
	}

	public function t_report_lists()
	{
		return $this->hasMany(\App\Models\TReportList::class, 'ReportID');
	}



	public function count_number_of_days_unprocess()
	{

		DB::table('t_report')->where('Status','For Verification')->update(['OnHold'=>DB::raw('DateDiff(Now(),ReportDate)')]);



	}

	//MIDDLEMAN MODEL FUNCTIONS

	public function load_report_attachments()
	{

		$Report_Attachments=$this->select('ReportFileName')
		->from('t_report_list')
		->where('ReportID',request('ReportID'))->get();

		echo json_encode($Report_Attachments);

	}


	public function send_to_officials()
	{
		$Send_To=request('SendTo');
		$ValidateReport=$this->where('ReportID',request('ReportID'))->first();

		if($Send_To=="OSAS"||$Send_To=="Guidance Counselor")
		{	
			

			$ValidateReport->Status='For Verification';
			$ValidateReport->ValidatedBy='4';
			$ValidateReport->save();


		}
		else
		{


			$ValidateReport->Status='For Verification';
			$ValidateReport->IsVerifiedByAll=1;
			$ValidateReport->save();
		}

	}



	public function remove_invalid_report()
	{
		
		$InvalidReport=$this->where('ReportID',request('ReportID'))->first();



		$InvalidReport->Status='Invalid Report';

		$InvalidReport->save();




	}


	public function generate_list_of_validated_reports()
	{
		
		$StartDate=request('StartDate');
		$EndDate=request('EndDate');
		
			$Generate_Report=$this->from('v_validatedreports')
									 ->whereRaw("ReportDate between '".$StartDate."' and '".$EndDate."'")									
									 ->get();

		echo json_encode($Generate_Report);



	}




	public function generate_list_of_invalid_reports()
	{
		
		$StartDate=request('StartDate');
		$EndDate=request('EndDate');
		
			$Generate_Report=$this->from('v_validated_reports_updated')
									 ->whereRaw("ReportDate between '".$StartDate."' and '".$EndDate."' and Status='Invalid Report'")									
									 ->get();

		echo json_encode($Generate_Report);



	}






}
