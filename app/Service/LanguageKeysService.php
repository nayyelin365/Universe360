<?php 
namespace App\Service;
use App\Model\LanguageKeysModel;
use App\Model\LanguagesModel;

	class LanguageKeysService 
	{
	    public function get_all()
		{
			return LanguageKeysModel::with('keys','languages')->get()->where('languages.public_access','Yes');
		}
		public function get_key_value_and_audio_of_language($request)
		{
			return LanguageKeysModel::with('keys','languages')->get()->where('languages.language_name',$request->language_name)->where('languages.public_access','Yes');
		}
	}
?>
