<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\LanguageKeysService;
use App\Model\LanguagesModel;
use App\Model\KeysModel;
use App\Model\LanguageKeysModel;

class LanguageKeysController extends Controller
{
    function __construct()
    {
        $this->LanguageKeysService = new LanguageKeysService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->LanguageKeysService->get_all();
        return dd($data);
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
        $languageKeys = LanguageKeysModel::all();
        foreach ($languageKeys as $languageKey) {
            $audio_id='audio_'.$languageKey->id;
            if($request->hasFile($audio_id)){
                $audioName ='key_value_of_'.$languageKey->keys->key_name.'_in_'. $languageKey->languages->language_name.'.'.$request->$audio_id->getClientOriginalExtension();
                $request->$audio_id->move(public_path('audio'), $audioName);
                $path='public/audio/'.$audioName;
            }
            else {
                $path=$request->$audio_id;
            }
            
            $languageKeys->language_audio=$path;

            $languageKey->update(["key_description" => request("key_description_".$languageKey->id),"language_audio" => $path]);
        }

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
        //
    }
     public function descriptionupdate(Request $request)
    {
        $languagesModel = LanguagesModel::find($request->id);
        $languagesModel->public_access = "Yes";
        $languagesModel->save();

        return response("ok");
    }
}
