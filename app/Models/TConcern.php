<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TConcern
 * 
 * @property int $ConcernID
 * @property int $UserID
 * @property int $AdminID
 * @property string $ConcernDescription
 * @property string $Feedback
 * @property \Carbon\Carbon $DateReceived
 * @property \Carbon\Carbon $DateFeedback
 * @property string $Status
 * 
 * @property \App\Models\SsUser $ss_user
 *
 * @package App\Models
 */
class TConcern extends Eloquent
{
	protected $table = 't_concern';
	protected $primaryKey = 'ConcernID';
	public $timestamps = false;

	protected $casts = [
		'UserID' => 'int',
		'AdminID' => 'int'
	];

	protected $dates = [
		'DateReceived',
		'DateFeedback'
	];

	protected $fillable = [
		'UserID',
		'AdminID',
		'ConcernDescription',
		'Feedback',
		'DateReceived',
		'DateFeedback',
		'Status'
	];

	public function ss_user()
	{
		return $this->belongsTo(\App\Models\SsUser::class, 'UserID');
	}
}
