<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\AppService;
use App\Service\LanguagesService;
use App\Service\AppLanguageService;
use App\Http\Resources\TestResource;
use App\Model\AppModel;
use App\Model\LanguageKeysModel;
use App\Model\KeysModel;

class AppLanguageController extends Controller
{
    function __construct()
    {
        $this->AppService = new AppService();
        $this->LanguagesService = new LanguagesService();
        $this->AppLanguageService = new AppLanguageService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //App
        $app = AppModel::find($id);
        
        //LanguageIdList
        $languageIds = $app->app_language->pluck('language_id');

        //LanguageKeyList
        $keyIds = LanguageKeysModel::whereIn('language_id',$languageIds)->pluck('key_id');
        
        $uniqueKeyIds = $keyIds->unique();

        $keys = KeysModel::whereIn('id',$uniqueKeyIds)->get();

        $data['keys'] = $keys;
        $data['languageIds'] = $languageIds;
        $data["language_get_all"] = $this->LanguagesService->get_all();
        $data["app_language_get_all"] = $this->AppLanguageService->get_app_language($id);
        return view('app_language_view')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->AppLanguageService->insert($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $app_language=$this->AppLanguageService->get($id);
        $app_language->delete();

        return redirect()->back();
    }
    public function setPublicAccess(Request $request)
    {
        $language_id = $request->id;
        $arr['public_access'] = "Yes";
        $this->AppLanguageService->update($arr,$language_id);
        return redirect()->back();
    }
    public function unsetPublicAccess(Request $request){
        $language_id = $request->id;
        $arr['public_access'] = "No";
        $this->AppLanguageService->update($arr,$language_id);
        return redirect()->back();
    }
}
