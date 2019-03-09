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

/**
 * Class PlacesController
 * @package App\Http\Controllers\Api
 */
class PlacesController extends Controller
{
    /**
     * @var Place
     */
    protected $places;

    /**
     * PlacesController constructor.
     * @param Place $places
     */
    public function __construct(Place $places)
    {
        $this->places = $places;
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        $places = $this->places->all();
        return response()->json($places);
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $place = Place::create($request->only([
            'name',
            'latitude',
            'longitude'
        ]));

        return response()->json($place, 201);
    }

    /**
     * @param Place $place
     * @param ShowRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Place $place, ShowRequest $request)
    {
        return response()->json($place, 200);
    }

    /**
     * @param Place $place
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Place $place, UpdateRequest $request)
    {
        $place->update($request->only([
            'name',
            'latitude',
            'longitude',
        ]));

        return response()->json($place, 200);
    }

    /**
     * @param Place $place
     * @param DestroyRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Place $place, DestroyRequest $request)
    {
        $place->delete();

        return response()->json([], 200);
    }
}
