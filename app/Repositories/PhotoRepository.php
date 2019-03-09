<?php

namespace App\Repositories;

use Illuminate\Http\Request;

class PhotoRepository
{
    /**
     * @param Request $request
     * @return string
     */
    public static function upload(Request $request)
    {
        // TODO - Implementar lògica de almacenamiento en nube
        return "URL";
    }
}
