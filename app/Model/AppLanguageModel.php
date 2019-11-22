<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppLanguageModel extends Model
{
    protected $table = 'app_language';
	public function app()
	{
		return $this->belongsTo('App\Model\AppModel','app_id');
	}
	public function language()
	{
		return $this->belongsTo('App\Model\LanguageModel','language_id');
	}
	public function app_language_key()
	{
		return $this->hasMany('App\Model\AppLanguageKeyModel','app_language_id');
	}

}
