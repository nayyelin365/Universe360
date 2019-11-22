<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppModel extends Model
{
    protected $table = 'app';
	public function app_language()
	{
		return $this->hasMany('App\Model\AppLanguageModel','app_id');
	}
}
