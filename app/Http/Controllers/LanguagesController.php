<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\LanguagesService;
use App\Service\KeysService;
use App\Service\LanguageKeysService;
use App\Model\LanguagesModel;

class LanguagesController extends Controller
{
    function __construct()
    {
        $this->LanguageKeysService = new LanguageKeysService();
        $this->LanguagesService = new LanguagesService();
        $this->KeysService=new KeysService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["language_get_all"] = $this->LanguagesService->get_all();
        $data["language_key_des"]=$this->KeysService->getKeyDesription();
        return view('addlanguageview')->with($data);
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
         $this->LanguagesService->insert($request);
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
    public function update(Request $request)
    {
        $id = $request->id;
        $arr['language_name'] = $request->language_name;
        $this->LanguagesService->update($arr,$id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;

        $language_keys=$this->LanguageKeysService->get_language($id);
        foreach ($language_keys as $language_key) {
            $language_key->delete();
        }
        $language=$this->LanguagesService->get($id);
        $language->delete();

        return redirect()->back();
    }

    //Ajax
    public function setPublicAccess(Request $request)
    {
        $languagesModel = LanguagesModel::find($request->id);
        $languagesModel->public_access = "Yes";
        $languagesModel->save();

        return response("ok");
    }
    public function unsetPublicAccess(Request $request){
        $access=LanguagesModel::find($request->id);
        $access->public_access="No";
        $access->save();
    }
}
