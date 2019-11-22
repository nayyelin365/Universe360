<?php 
namespace App\Service;
use App\Model\AppModel;
use App\Model\LanguageModel;
use App\Model\AppLanguageModel;
	class AppService 
	{
	    public function get_all()
		{
			return AppModel::get(['id','app_name','app_image']);
		}
		public function get($id)
		{
		    return AppModel::find($id);

		}
		public function insert($request)
	    {
	        $app=new AppModel();
	        $app->app_name = $request->app_name;
	        $app->app_image = $request->app_image;
	        $app->save();
	    }
	}
?>
