<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $teams = [];
        $pageLength = 5;

        if (isset($request->name) && !empty($request->name)) {

            $teams = Team::where('name', 'LIKE', "%$request->name%")->paginate($pageLength);

        } else {

            $teams = Team::paginate($pageLength);

        }

        return response()->json([
            'data' => $teams,
        ], HttpResponse::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request)
    {
        $team = Team::create([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json([
            'data' => $team
        ], HttpResponse::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        return response()->json([
            'data' => $team
        ], HttpResponse::HTTP_FOUND);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, Team $team)
    {
        $team->update([
            'name' => $request->name,
            'slug' => $request->name,
            'description' => $request->description,
            'price' => $request->price
        ]);

        return response()->json([
            'data' => $team
        ], HttpResponse::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        $team->delete();
        return $team;
    }
}
