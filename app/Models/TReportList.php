<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class TReportList
 * 
 * @property int $ReportListID
 * @property int $ReportID
 * @property string $ReportFileName
 * 
 * @property \App\Models\TReport $t_report
 *
 * @package App\Models
 */
class TReportList extends Eloquent
{
	protected $table = 't_report_list';
	protected $primaryKey = 'ReportListID';
	public $timestamps = false;

	protected $casts = [
		'ReportID' => 'int'
	];

	protected $fillable = [
		'ReportID',
		'ReportFileName'
	];

	public function t_report()
	{
		return $this->belongsTo(\App\Models\TReport::class, 'ReportID');
	}
}
