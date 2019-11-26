<?php 
namespace App\Service;

use App\Model\LanguagesModel;
use App\Model\KeysModel;
use App\Model\LanguageKeysModel;

	class LanguagesService 
	{
	    public function get_all()
		{
			return LanguagesModel::all();
		}
		public function get_app_language_key($id){
			return LanguagesModel::with('app_language','language_keys')->get()->where('app_language.app_id',$id);
		}
		public function get($id)
		{
		    return LanguagesModel::find($id);

		}
		public function get_languages_according_to_public_access()
		{
			return LanguagesModel::all()->where('public_access','Yes');
		}
		public function insert($request)
	    {
	        $languages=new LanguagesModel();
	        $languages->language_name = $request->language_name;
	        $languages->public_access = 'No';
	        $languages->save();

	        $languages=LanguagesModel::all()->where('language_name',$request->language_name);
	        $language_id=0;
	        foreach ($languages as $language) {
	        	$language_id=$language->id;
	        }
	        $keys=KeysModel::all();
	        foreach ($keys as $key) {
	        	$language_keys=new LanguageKeysModel();
		        $language_keys->key_id = $key->id;
		        $language_keys->language_id = $language_id;
		        $language_keys->save();
	        }
	    }
	    public function update($arr,$id)
		{
		    LanguagesModel::where('id',$id)->update($arr);
		}

		public function get_app_language($id)
		{
			return LanguagesModel::all();
		}
	}
?>
