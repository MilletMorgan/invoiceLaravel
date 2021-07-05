<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
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
        return Organisation::query()
            ->with('missions')
            ->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Builder|Model
     */
    public function store(Request $request): Model|Builder
    {
        return Organisation::query()
            ->create([
                'id' => Str::uuid(),
                'slug' => $request->slug,
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'address' => $request->address,
                'type' => $request->type
            ]);
    }


    public function show(string $id): Model|\Illuminate\Database\Query\Builder|null
    {
        return DB::table('organisations')
            ->where('id', $id)
            ->first();
    }


    /**
     * @param Request $request
     * @param string $id
     * @return int
     */
    public function update(Request $request, string $id): int
    {
        return DB::table('organisations')
            ->where('id', $id)
            ->update([
                'slug' => $request->slug,
                'name' => $request->name,
                'email' => $request->email,
                'tel' => $request->tel,
                'address' => $request->address,
                'type' => $request->type
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $id
     * @return void
     */
    public function destroy(string $id): void
    {
        $organisation = DB::table('organisations')
            ->where('id', $id)
            ->first();

        $organisation->delete();
    }
}
