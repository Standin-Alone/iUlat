<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SsRemark
 * 
 * @property int $RemarkID
 * @property string $RemarkDescription
 * @property \Carbon\Carbon $DateCreated
 * @property int $ReportID
 * 
 * @property \App\Models\TReport $t_report
 *
 * @package App\Models
 */
class SsRemark extends Eloquent
{
	protected $table = 'ss_remark';
	protected $primaryKey = 'RemarkID';
	public $timestamps = false;

	protected $casts = [
		'ReportID' => 'int'
	];

	protected $dates = [
		'DateCreated'
	];

	protected $fillable = [
		'RemarkDescription',
		'DateCreated',
		'ReportID'
	];

	public function t_report()
	{
		return $this->belongsTo(\App\Models\TReport::class, 'ReportID');
	}
}
