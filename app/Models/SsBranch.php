<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SsBranch
 * 
 * @property int $BranchID
 * @property string $BranchName
 * 
 * @property \Illuminate\Database\Eloquent\Collection $ss_users
 *
 * @package App\Models
 */
class SsBranch extends Eloquent
{
	protected $primaryKey = 'BranchID';
	public $timestamps = false;

	protected $fillable = [
		'BranchName'
	];

	public function ss_users()
	{
		return $this->hasMany(\App\Models\SsUser::class, 'BranchID');
	}





	


	
}
