<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Pets\DestroyRequest;
use App\Http\Requests\Pets\IndexRequest;
use App\Http\Requests\Pets\ShowRequest;
use App\Http\Requests\Pets\StoreRequest;
use App\Http\Requests\Pets\UpdateRequest;
use App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetsController extends Controller
{
    protected $pets;

    public function __construct(Pet $pets)
    {
        $this->pets = $pets;
    }

    public function index(IndexRequest $request)
    {
        $pets = $this->pets->all();
        return response()->json($pets);
    }

    public function store(StoreRequest $request)
    {
        $pet = Pet::create($request->only([
            'name',
            'born_at',
        ]));

        $pet->user_id = auth('api')->user()->id;

        return response()->json($pet, 201);
    }

    public function show(Pet $pet, ShowRequest $request)
    {
        return response()->json($pet, 200);
    }

    public function update(Pet $pet, UpdateRequest $request)
    {
        $pet->update($request->only([
            'name',
            'born_at',
        ]));

        return response()->json($pet, 200);
    }

    public function destroy(Pet $pet, DestroyRequest $request)
    {
        $pet->delete();

        return response()->json([], 200);
    }
}
