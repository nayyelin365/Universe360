<?php 
namespace App\Service;
use App\Model\AppModel;
use App\Model\LanguageModel;
use App\Model\AppLanguageModel;
	class AppLanguageService 
	{
	    public function get_all()
		{
			return AppLanguageModel::with('app','language')->get();
		}
		public function get_app_language($id)
		{
			return AppLanguageModel::with('language')->where('language_id',$id)->get();
		}
		public function get_app_language_key($id)
		{
			return AppLanguageModel::with('language','app_language_key')->where('language_id',$id)->get();
		}
	}
?>
