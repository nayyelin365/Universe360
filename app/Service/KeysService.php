<?php 
namespace App\Service;
use App\Model\KeysModel;
use App\Model\LanguagesModel;
	class KeysService 
	{
	    public function get_all()
		{
			return KeysModel::get(['id','key_name']);
		}
		public function insert($request)
	    {
	    	
	        $keys=new KeysModel();
	        $keys->key_name = $request->key_name;
	        $keys->save();
	    }
		public function getKeyDesription(){
			return KeysModel::with('language_keys')->get();

		}	
	}
?>
