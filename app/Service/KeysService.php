<?php 
namespace App\Service;
use App\Model\LanguagesModel;
use App\Model\KeysModel;
use App\Model\LanguageKeysModel;
	class KeysService 
	{
	    public function get_all()
		{
			return KeysModel::get(['id','key_name']);
		}
		public function get($id)
		{
		    return KeysModel::find($id);

		}
		public function insert($request)
	    {
	        $keys=new KeysModel();
	        $keys->key_name = $request->key_name;
	        $keys->save();
	        $languages=LanguagesModel::all();
	        $keys=KeysModel::all()->where('key_name',$request->key_name);
	        $data=0;
	        foreach ($keys as $key) {
	        	$key_id=$key->id;
	        }
	        foreach ($languages as $language) {
	        	$language_keys=new LanguageKeysModel();
		        $language_keys->key_id = $key_id;
		        $language_keys->language_id = $language->id;
		        $language_keys->save();
	        }
	        
	    }
		public function getKeyDesription(){
			return KeysModel::with('language_keys')->get();

		}	
		public function update($arr,$id)
		{
		    KeysModel::where('id',$id)->update($arr);
		}
	}
?>
