<?php

namespace App\Http\Controllers\Api;

use App\Place;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PlacePhotosController extends Controller
{
    public function index(Place $place)
    {
        return response()->json($place->photos);
    }
}
