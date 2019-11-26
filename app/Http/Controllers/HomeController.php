<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\LanguagesService;
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
        return redirect()->route('app');  
    }
}