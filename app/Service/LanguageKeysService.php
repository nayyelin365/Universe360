<?php 
namespace App\Service;
use App\Model\LanguageKeysModel;
use App\Model\LanguagesModel;
use DB;

	class LanguageKeysService 
	{
	    public function get_all()
		{
			return LanguageKeysModel::with('keys','languages')->get();
		}
		public function insert($request)
		{
			$languageDes=new LanguageKeysModel();
			$languageDes->key_description = $request->key_description; 
			$languageDes->save();
		}

		public function get_language_keys_according_to_language()
		{
			$data = DB::table('language_keys')
			        ->join('languages', 'language_keys.language_id', '=', 'languages.id')
			        ->join('keys', 'language_keys.key_id', '=', 'keys.id')
			        ->select( 'languages.language_name as language','keys.key_name as key','language_keys.key_description as value', 'language_keys.language_audio as audio')
			        ->get();
			return $data;
		}
 
	}
?>
