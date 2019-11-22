<?php 
namespace App\Service;

use App\Model\AppModel;
use App\Model\LanguageModel;
use App\Model\AppLanguageModel;
use App\Model\AppLanguageKeyModel;

	class AppLanguageKeyService 
	{
	    public function get_all()
		{
			return AppLanguageKeyModel::with('app_language')->get();
		}
		public function get($id)
		{
		    return AppLanguageKeyModel::find($id);
		}
	}
?>
