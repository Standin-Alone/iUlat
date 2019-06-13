<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;
use DB;
use Illuminate\Auth\Authenticatable;
use Auth;

/**
 * Class SsUser
 * 
 * @property int $UserID
 * @property string $FirstName
 * @property string $MiddleName
 * @property string $LastName
 * @property string $Contact
 * @property string $Email
 * @property string $Username
 * @property string $Password
 * @property int $RoleID
 * @property string $Status
 * @property int $BranchID
 * @property float $CurrentPoints
 * 
 * @property \App\Models\SsBranch $ss_branch
 * @property \App\Models\SsRole $ss_role
 * @property \Illuminate\Database\Eloquent\Collection $t_concerns
 * @property \Illuminate\Database\Eloquent\Collection $t_reports
 *
 * @package App\Models
 */
class SsUser extends Eloquent
{
	use Authenticatable;
	protected $primaryKey = 'UserID';
	public $timestamps = false;

	protected $casts = [
		'RoleID' => 'int',
		'BranchID' => 'int',
		'CurrentPoints' => 'float'
	];

	protected $fillable = [
		'FirstName',
		'MiddleName',
		'LastName',
		'Contact',
		'Email',
		'Username',
		'Password',
		'RoleID',
		'Status',
		'BranchID',
		'CurrentPoints'
	];

	public function ss_branch()
	{
		return $this->belongsTo(\App\Models\SsBranch::class, 'BranchID');
	}

	public function ss_role()
	{
		return $this->belongsTo(\App\Models\SsRole::class, 'RoleID');
	}

	public function t_concerns()
	{
		return $this->hasMany(\App\Models\TConcern::class, 'UserID');
	}

	public function t_reports()
	{
		return $this->hasMany(\App\Models\TReport::class, 'VerifiedBy');
	}



	public function edit_my_account()
	{	


		$GetUserRecord=$this->where('userid',request('user_id_txt'))->first();
		if(request('new_password_txt')=='')
		{
			$GetUserRecord->FirstName=request('first_name_txt');
			$GetUserRecord->MiddleName=request('middle_name_txt');
			$GetUserRecord->LastName=request('last_name_txt');
			$GetUserRecord->Contact=request('contact_txt');
			$GetUserRecord->Email=request('email_main_txt');
			$GetUserRecord->save();
		}
		else
		{
			$GetUserRecord->FirstName=request('first_name_txt');
			$GetUserRecord->MiddleName=request('middle_name_txt');
			$GetUserRecord->LastName=request('last_name_txt');
			$GetUserRecord->Contact=request('contact_txt');
			$GetUserRecord->Email=request('email_main_txt');
			$GetUserRecord->Password=DB::raw('AES_encrypt('.request('new_password_txt').',911)');



			$GetUserRecord->save();
		}

	}



	public function sign_in()
	{

		$GetAuthenticate=DB::table('v_users_nd')->where('username',request('UsernameTxt'))->where(DB::raw('aes_decrypt(password,911)'), request('PasswordTxt'))->where('status','Active')->get();
		if($GetAuthenticate->isEmpty())
		{
			echo "0";

		}
		else
		{	
			foreach ($GetAuthenticate as $value) {

				session(['session_userid'=>$value->UserID]);
				session(['session_first_name'=>$value->Firstname]);
				session(['session_middle_name'=>$value->Middlename]);
				session(['session_last_name'=>$value->Lastname]);
				session(['session_contact'=>$value->Contact]);
				session(['session_email'=>$value->Email]);
				session(['session_position'=>$value->RoleDescription]);
			}
			echo "1";

		}


	}




}
