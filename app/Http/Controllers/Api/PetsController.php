<?php

namespace App\Http\Controllers\Api;

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

    public function index()
    {
        $pets = $this->pets->all();
        return response()->json($pets);
    }

    public function store(Request $request)
    {
        $pet = Pet::create($request->only([
            'name',
            'born_at',
        ]));

        return response()->json($pet, 201);
    }

    public function show(Pet $pet)
    {
        return response()->json($pet, 200);
    }

    public function update(Pet $pet, Request $request)
    {
        $pet->update($request->only([
            'name',
            'born_at',
        ]));

        return response()->json($pet, 200);
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();

        return response()->json([], 200);
    }
}
