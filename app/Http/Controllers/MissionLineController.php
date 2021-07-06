<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\MissionLine;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MissionLineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Builder[]|Collection
     */
    public function index(): Collection|array
    {
        return MissionLine::query()
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request): Response
    {

    }

    /**
     * Display the specified resource.
     *
     */
    public function show(string $id): Model|\Illuminate\Database\Query\Builder|null
    {
        return DB::table('mission_lines')
            ->where('id', $id)
            ->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return int
     */
    public function update(Request $request): int
    {
        return DB::table('mission_lines')
        ->where('id', $request->id)
        ->update([
            'title' => $request->title,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'unity' => $request->unity,
            'mission_id' => $request->mission_id
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return Response
     */
    public function destroy(string $id): Response
    {
        $missionLine = DB::table('mission_lines')
            ->where('id', $id)
            ->first();

        $missionLine->delete();
    }
}
