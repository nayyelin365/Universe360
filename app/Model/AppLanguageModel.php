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
	public function languages()
	{
		return $this->belongsTo('App\Model\LanguagesModel','language_id');
	}
}
