<?php 
namespace App\Service;
use App\Model\LanguagesModel;
use DB;

	class LanguagesService 
	{
	    public function get_all()
		{
			return LanguagesModel::get(['id','language_name','public_access']);
		}
	}
?>
