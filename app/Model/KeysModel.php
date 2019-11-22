<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class KeysModel extends Model
{
    protected $table = 'keys';
	public function language_keys()
	{
		return $this->hasMany('App\Model\LanguageKeysModel','key_id');
	}
}
