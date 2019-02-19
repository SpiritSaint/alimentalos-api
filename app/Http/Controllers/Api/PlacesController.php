<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Places\DestroyRequest;
use App\Http\Requests\Places\IndexRequest;
use App\Http\Requests\Places\ShowRequest;
use App\Http\Requests\Places\StoreRequest;
use App\Http\Requests\Places\UpdateRequest;
use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    protected $places;

    public function __construct(Place $places)
    {
        $this->places = $places;
    }

    public function index(IndexRequest $request)
    {
        $places = $this->places->all();
        return response()->json($places);
    }

    public function store(StoreRequest $request)
    {
        $place = Place::create($request->only([
            'name',
            'latitude',
            'longitude'
        ]));

        return response()->json($place, 201);
    }

    public function show(Place $place, ShowRequest $request)
    {
        return response()->json($place, 200);
    }

    public function update(Place $place, UpdateRequest $request)
    {
        $place->update($request->only([
            'name',
            'latitude',
            'longitude',
        ]));

        return response()->json($place, 200);
    }

    public function destroy(Place $place, DestroyRequest $request)
    {
        $place->delete();

        return response()->json([], 200);
    }
}
