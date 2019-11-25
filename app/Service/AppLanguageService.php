<?php 
namespace App\Service;
use App\Model\AppModel;
use App\Model\LanguageModel;
use App\Model\AppLanguageModel;
	class AppLanguageService 
	{
	    public function get_all()
		{
			return AppLanguageModel::with('app','languages')->get();
		}
		public function get_app_language($id)
		{
			return AppLanguageModel::with('languages')->where('app_id',$id)->get();
		}
	}
?>
