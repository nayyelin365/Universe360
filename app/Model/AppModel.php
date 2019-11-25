<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

class AppModel extends Model
{
    protected $table = 'app';
	public function app_language()
	{
		return $this->hasMany('App\Model\AppLanguageModel','app_id');
	}

    public function language_keys() {
        return $this->hasManyDeep(LanguageKeysModel::class, [LanguagesModel::class, AppLanguageModel::class]);
    }

}
