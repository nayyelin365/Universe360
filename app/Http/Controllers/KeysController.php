<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\KeysService;
use App\Service\LanguageKeysService;

class KeysController extends Controller
{
    function __construct()
    {
        $this->LanguageKeysService = new LanguageKeysService();
        $this->KeysService = new KeysService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= $this->KeysService->get_all();
        return response()->json($data);
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
        $this->KeysService->insert($request);
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
    public function update(Request $request)
    {   
        $id = $request->id;
        $arr['key_name'] = $request->key_name;
        $this->KeysService->update($arr,$id);
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

        $language_keys=$this->LanguageKeysService->get_key($id);
        foreach ($language_keys as $language_key) {
            $language_key->delete();
        }
        $key=$this->KeysService->get($id);
        $key->delete();

        return redirect()->back();
    }

    public function delete($id)
    {
        $language_keys=$this->LanguageKeysService->get_key($id);
        foreach ($language_keys as $language_key) {
            $audio_path=$language_key->language_audio;
            if (file_exists($audio_path)) {
               @unlink($audio_path);
           }
           $language_key->delete();
        }
        $key=$this->KeysService->get($id);
        $key->delete();

        return redirect()->back();
    }
}
