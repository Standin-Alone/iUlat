<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SsReportType
 * 
 * @property int $ReportTypeID
 * @property string $ReportTypeDescription
 * 
 * @property \Illuminate\Database\Eloquent\Collection $t_reports
 *
 * @package App\Models
 */
class SsReportType extends Eloquent
{
	protected $table = 'ss_report_type';
	protected $primaryKey = 'ReportTypeID';
	public $timestamps = false;

	protected $fillable = [
		'ReportTypeDescription'
	];

	public function t_reports()
	{
		return $this->hasMany(\App\Models\TReport::class, 'ReportTypeID');
	}
}
