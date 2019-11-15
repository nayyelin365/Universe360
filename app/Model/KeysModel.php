<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeysModel extends Model
{
	use SoftDeletes;
    protected $table = 'keys';
    
	public function language_keys()
	{
		return $this->hasMany('App\Model\LanguageKeysModel','key_id');
	}
}
