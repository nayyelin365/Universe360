<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppLanguageKeyModel extends Model
{
    protected $table = 'app_language_key';
    protected $guarded = [];
	public function app_language()
	{
		return $this->belongsTo('App\Model\AppLanguageModel','app_language_id');
	}
}
