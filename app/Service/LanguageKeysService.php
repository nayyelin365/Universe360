<?php 
namespace App\Service;
use App\Model\LanguageKeysModel;
use DB;

	class LanguageKeysService 
	{
	    public function get_all()
		{
	        /*$data = DB::table('language_keys')
			        ->join('languages', 'language_keys.language_id', '=', 'languages.id')
			        ->join('keys', 'language_keys.key_id', '=', 'keys.id')
			        ->select('keys.key_name as key_name', 'languages.language_name as language_name','language_keys.key_description as key_description', 'language_keys.language_audio as language_audio')
			        ->get();
			return $data;*/
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
			$languages=DB::table('languages')
					->select( 'languages.id as language_id','languages.language_name as language_name')
			        ->get();
			foreach ($languages as $language) 
			{
				$data[$language->language_name] = DB::table('language_keys')
			        ->join('languages', 'language_keys.language_id', '=', 'languages.id')
			        ->join('keys', 'language_keys.key_id', '=', 'keys.id')
			        ->where('language_keys.language_id', '=',$language->language_id)
			        ->select('keys.key_name as key','language_keys.key_description as value', 'language_keys.language_audio as audio')
			        ->get();
			}
			return $data;
		}
	}
?>
