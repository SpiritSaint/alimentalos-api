<?php

namespace App\Http\Controllers\Api;

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

    public function index()
    {
        $places = $this->places->all();
        return response()->json($places);
    }

    public function store(Request $request)
    {
        $place = Place::create($request->only([
            'name',
            'latitude',
            'longitude'
        ]));

        return response()->json($place, 201);
    }

    public function show(Place $place)
    {
        return response()->json($place, 200);
    }

    public function update(Place $place, Request $request)
    {
        $place->update($request->only([
            'name',
            'latitude',
            'longitude',
        ]));

        return response()->json($place, 200);
    }

    public function destroy(Place $place)
    {
        $place->delete();

        return response()->json([], 200);
    }
}
