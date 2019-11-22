<?php 
namespace App\Service;

use App\Model\AppModel;
use App\Model\LanguageModel;
use App\Model\AppLanguageModel;
use App\Model\AppLanguageKeyModel;

	class LanguageService 
	{
	    public function get_all()
		{
			return LanguageModel::all();
		}
		public function get($id)
		{
		    return LanguageModel::find($id);
		}
	}
?>
