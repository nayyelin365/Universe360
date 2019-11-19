<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\LanguagesService;
use App\Model\LanguagesModel;
use App\Service\KeysService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
         $this->LanguagesService = new LanguagesService();
        $this->KeysService=new KeysService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       $data["language_get_all"] = $this->LanguagesService->get_all();
        $data["language_key_des"]=$this->KeysService->getKeyDesription();
        return view('addlanguageview')->with($data);
    }
}
