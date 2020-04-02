<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\OngResource;
use App\Ong;
use App\Http\Requests\OngPost;

class OngController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return OngResource::collection(Ong::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OngPost $request)
    {

        $ong = new Ong();

        $request->validated();


        do{
          $id = substr(md5(uniqid(rand(), true)),0,8);
          $exists = $ong->where('id', $id)->first();
        }while ($exists <> null);

        $ong->id = $id;
        $ong->name = $request->name;
        $ong->email = $request->email;
        $ong->whatsapp = $request->whatsapp;
        $ong->city = $request->city;
        $ong->uf = $request->uf;

        $ong->save();

        return response()->json(['id' => $id]);
    }

    // ["name"=> "teste1Laravel", "email"=> "contato", "whatsapp"=> "64000000000", "city"=> "Catalão", "uf"=> "GO"]

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($ong_id)
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
