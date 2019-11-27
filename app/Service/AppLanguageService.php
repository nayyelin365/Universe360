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
		public function get($id)
		{
			return AppLanguageModel::find($id);
		}
		public function get_app_language($id)
		{
			return AppLanguageModel::with('languages')->where('app_id',$id)->get();
		}
		public function update($arr,$language_id)
		{
		    AppLanguageModel::where('language_id',$language_id)->update($arr);
		}
		public function insert($request)
	    {
	    	$app_id=$request->app_id;
	    	$app = AppModel::find($app_id);
	    	$langIds=$request->langIds;

	        foreach ($langIds as $value) {

	        	$checkAppLang = $app->app_language()->where('language_id',$value)->first();

	        	if(!$checkAppLang){

	        		$app_language=new AppLanguageModel();
	        		$app_language->app_id =$app_id; 
	        		$app_language->language_id = $value;
	        		$app_language->public_access = 'No';
	        		$app_language->save();  

	        	} 
	        }
	    }
	}
?>
