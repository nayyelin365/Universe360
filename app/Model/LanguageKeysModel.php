<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguageKeysModel extends Model
{
    use SoftDeletes;
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
