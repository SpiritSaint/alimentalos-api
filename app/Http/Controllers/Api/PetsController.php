<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Pets\DestroyRequest;
use App\Http\Requests\Api\Pets\IndexRequest;
use App\Http\Requests\Api\Pets\ShowRequest;
use App\Http\Requests\Api\Pets\StoreRequest;
use App\Http\Requests\Api\Pets\UpdateRequest;
use App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * Class PetsController
 * @package App\Http\Controllers\Api
 */
class PetsController extends Controller
{
    /**
     * @var Pet
     */
    protected $pets;

    /**
     * PetsController constructor.
     * @param Pet $pets
     */
    public function __construct(Pet $pets)
    {
        $this->pets = $pets;
    }

    /**
     * @param IndexRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(IndexRequest $request)
    {
        $pets = $this->pets->all();
        return response()->json($pets);
    }

    /**
     * @param StoreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreRequest $request)
    {
        $pet = Pet::create($request->only([
            'name',
            'born_at',
        ]));

        $pet->user_id = auth('api')->user()->id;

        return response()->json($pet, 201);
    }

    /**
     * @param Pet $pet
     * @param ShowRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Pet $pet, ShowRequest $request)
    {
        return response()->json($pet, 200);
    }

    /**
     * @param Pet $pet
     * @param UpdateRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Pet $pet, UpdateRequest $request)
    {
        $pet->update($request->only([
            'name',
            'born_at',
        ]));

        return response()->json($pet, 200);
    }

    /**
     * @param Pet $pet
     * @param DestroyRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy(Pet $pet, DestroyRequest $request)
    {
        $pet->delete();

        return response()->json([], 200);
    }
}
