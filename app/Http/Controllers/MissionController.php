<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use App\Models\Organisation;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $missions = Mission::all();

        return view('mission.index', ['missions' => $missions]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
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

        $mission->missionLines()->createMany($request->mission_lines);

        return redirect()->route('missions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function show(string $id): View|Factory|Application
    {
        $mission = Mission::find($id);

        return view('mission.show', ['mission' => $mission]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        Mission::where('id', $id)
            ->update([
                'reference' => $request->reference,
                'organisation_id' => $request->organisation_id,
                'title' => $request->title,
                'comment' => $request->comment,
                'deposit' => $request->deposit,
                'ended_at' => $request->ended_at
            ]);

        return redirect()->route('missions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $mission = Organisation::find($id);

        $mission->delete();

        return redirect()->route('missions.index');
    }
}
