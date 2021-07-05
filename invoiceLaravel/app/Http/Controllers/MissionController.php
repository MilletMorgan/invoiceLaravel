<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\MissionLine;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request): Response
    {
        $mission = Mission::create([
                'id' => Str::uuid(),
                'reference' => $request->reference,
                'organisation_id' => $request->organisation_id,
                'title' => $request->title,
                'comment' => $request->comment,
                'deposit' => $request->deposit,
                'ended_at' => $request->ended_at
            ]);

        return Response($mission);
    }

    /**
     * Display the specified resource.
     *
     * @param Mission $mission
     * @return void
     */
    public function show(Mission $mission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Mission $mission
     * @return Response
     */
    public function update(Request $request, Mission $mission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Mission $mission
     * @return Response
     */
    public function destroy(Mission $mission)
    {
        //
    }
}
