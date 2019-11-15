<?php 
namespace App\Service;
use App\Model\LanguagesModel;

	class LanguagesService 
	{
	    public function get_all()
		{
			return LanguagesModel::all();
		}
		public function insert($request)
	    {
	        $languages=new LanguagesModel();
	        $languages->language_name = $request->language_name;
	        $languages->public_access = 'No';
	        $languages->save();
	    }
	}
?>
