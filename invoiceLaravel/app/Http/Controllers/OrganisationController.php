<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Organisation;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Builder[]
     */
    public function index(): array|Collection
    {
        return Organisation::query()->with('missions')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Organisation::query()->create([
            'id' => Str::uuid(),
            'slug' => $request->slug,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'type' => $request->type
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        $organisation = DB::table('organisations')->where('id', $id)->first();

        return view('organisation.index', ['organisation' => $organisation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(int $id): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        //
    }
}
