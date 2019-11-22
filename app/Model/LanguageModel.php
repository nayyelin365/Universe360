<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LanguageModel extends Model
{
    protected $table = 'language';
	public function app_language()
	{
		return $this->hasMany('App\Model\AppLanguageModel','language_id');
	}
}
