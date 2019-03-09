<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\Photos\IndexRequest;
use App\Http\Requests\Api\Photos\StoreRequest;
use App\Http\Requests\Api\Places\ShowRequest;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PhotoRepository;

/**
 * Class PhotosController
 * @package App\Http\Controllers\Api
 */
class PhotosController extends Controller
{
    protected $photos;

    public function __construct(Photo $photos)
    {
        $this->photos = $photos;
    }

    public function index(IndexRequest $request)
    {
        $photos = $this->photos->all();
        return response()->json($photos);
    }

    public function store(StoreRequest $request)
    {
        $url = PhotoRepository::upload($request);

        $photo = Photo::create([
            'url' => $url,
        ]);

        $photo->user_id = auth('api')->user()->id;

        return response()->json($photo, 201);
    }

    public function show(Photo $photo, ShowRequest $request)
    {
        return response()->json($photo, 200);
    }
}
