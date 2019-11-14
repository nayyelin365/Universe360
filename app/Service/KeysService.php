<?php 
namespace App\Service;
use App\Model\KeysModel;
use DB;
	class KeysService 
	{
	    public function get_all()
		{
			return KeysModel::get(['id','key_name']);
		}
	}
?>
