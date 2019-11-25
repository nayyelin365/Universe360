<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Service\LanguageKeysService;
use App\Service\LanguagesService;
use App\Http\Resources\LanguageKeysResource;
use App\Http\Resources\LanguagesResource;

use App\Service\AppService;
use App\Http\Resources\TestResource;


class LanguagesApiController extends Controller
{
    function __construct()
    {
        $this->LanguageKeysService = new LanguageKeysService();
        $this->LanguagesService = new LanguagesService();

        $this->AppService = new AppService();
    }
    public function app()
    {
        $data = $this->AppService->get_all();
        return TestResource::collection($data);
    }
    public function languages()
    {
        $data = $this->LanguagesService->get_languages_according_to_public_access();
        return LanguagesResource::collection($data);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   //get all languages
        $data = $this->LanguageKeysService->get_all();
        return response()->json($data);
        return LanguageKeysResource::collection($data);

        //get each language
        /*$data = $this->LanguageKeysService->get_key_value_and_audio_of_language($request);
        return LanguageKeysResource::collection($data);*/
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
        //
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
}
