<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Models\FileStorage as Storage;
use App\Models\AmazonStorage as Storage;

class StorageController extends Controller
{

    const TEMPO = 'zzz.txt';

    /**
     * STORAGE GET
     *
     * @param  Request  $request
     * @return Response
     */
    public function get(Request $request)
    {
        $response = Storage::get(self::TEMPO);
        if (!$response) {
            return '[FALSE]';
        }
        return '[CONTENTS][' . $response . ']';
    }

    /**
     * STORAGE PUT
     *
     * @param  Request  $request
     * @return Response
     */
    public function put(Request $request)
    {
        $response = Storage::put(self::TEMPO, time());
        return $response ? '[TRUE]' : '[FALSE]';
    }
}
