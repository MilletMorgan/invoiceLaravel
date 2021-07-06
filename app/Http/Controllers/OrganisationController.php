<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Str;
use App\Models\Organisation;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $organisations = Organisation::all();

        return view('organisation.index', ['organisations' => $organisations]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        /**
         * @var Organisation organisation
         */
        Organisation::create([
            'id' => Str::uuid(),
            'slug' => $request->slug,
            'name' => $request->name,
            'email' => $request->email,
            'tel' => $request->tel,
            'address' => $request->address,
            'type' => $request->type
        ]);

        return redirect()->route('organisations.index');
    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
         Organisation::where('id', $id)
            ->update([
                'slug' => $request->slug,
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'address' => $request->address,
                'type' => $request->type
            ]);

        return redirect()->route('organisations.index');
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function show(string $id): View|Factory|Application
    {
        $organisation = Organisation::find($id);

        return view('organisation.show', ['organisation' => $organisation]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $organisation = Organisation::find($id);

        $organisation->delete();

        return redirect()->route('organisations.index');
    }
}
