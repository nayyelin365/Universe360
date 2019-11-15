<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\LanguageKeysService;
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
            
            $languageKey->update(["key_description" => request("key_description_".$languageKey->id)]);
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