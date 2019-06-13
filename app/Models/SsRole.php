<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SsRole
 * 
 * @property int $RoleID
 * @property string $RoleDescription
 * 
 * @property \Illuminate\Database\Eloquent\Collection $ss_users
 *
 * @package App\Models
 */
class SsRole extends Eloquent
{
	protected $primaryKey = 'RoleID';
	public $timestamps = false;

	protected $fillable = [
		'RoleDescription'
	];

	public function ss_users()
	{
		return $this->hasMany(\App\Models\SsUser::class, 'RoleID');
	}
}
