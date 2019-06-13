<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 28 May 2019 05:58:50 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class SsReward
 * 
 * @property int $RewardID
 * @property string $RewardDescription
 * @property int $Cost
 *
 * @package App\Models
 */
class SsReward extends Eloquent
{
	protected $table = 'ss_reward';
	protected $primaryKey = 'RewardID';
	public $timestamps = false;

	protected $casts = [
		'Cost' => 'int'
	];

	protected $fillable = [
		'RewardDescription',
		'Cost'
	];
}
