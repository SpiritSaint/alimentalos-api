<?php

namespace App\Http\Controllers\Api;

use App\Pet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PetPhotosController extends Controller
{
    public function index(Pet $pet)
    {
        return response()->json($pet->photos);
    }
}
