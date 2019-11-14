<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LanguagesModel extends Model
{
    use SoftDeletes;
    protected $table = 'languages';
	public function languagekeys()
	{
		return $this->hasMany('App\Model\LanguageKeysModel','language_id');
	}
}
