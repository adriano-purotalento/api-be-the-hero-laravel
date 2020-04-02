<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\IncidentPost;
use App\Incident;

class IncidentsController extends Controller
{
  public function index()
  {
    $incidents = Incident::join('ongs', 'ongs.id', '=', 'incidents.ong_id')
        ->get(['incidents.id',
                'incidents.title',
                'incidents.description',
                'incidents.value',
                'ongs.name',
                'ongs.email',
                'ongs.whatsapp',
                'ongs.city',
                'ongs.uf']);

    if (!$incidents) {
        throw new HttpException(400, "Invalid data");
    }

        return response()->json($incidents, 200);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(IncidentPost $request)
  {
        $incident = new Incident();

        $request->validated();

        $incident->title = $request->title;
        $incident->description = $request->description;
        $incident->value = $request->value;
        $incident->ong_id = $request->header('authorization');

        $incident->save();

        return response()->json(['id' => $incident->id]);


  }

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
  public function destroy(Request $request, $id)
  {
      //
      [$incident] = (Incident::where('id', $id)->count()) <> 0 ? (Incident::where('id', $id)->get()) : [];

      if (empty($incident) or $incident->ong_id <> $request->header('authorization')){
       return response()->json(['error' => 'Operation not permitted.'] , 401);
     }

     $incident->delete();

     return response(Response::HTTP_NO_CONTENT);
  }

}
