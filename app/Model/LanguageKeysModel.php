<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LanguageKeysModel extends Model
{
    protected $table = 'language_keys';
    protected $guarded = [];
	public function keys()
	{
		return $this->belongsTo('App\Model\KeysModel','key_id');
	}
	public function languages()
	{
		return $this->belongsTo('App\Model\LanguagesModel','language_id');
	}
}
