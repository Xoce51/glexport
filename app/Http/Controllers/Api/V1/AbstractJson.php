<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AbstractJson extends Controller
{
    /**
     * Build JSON http response
     *
     * @param array $data   The data to return
     * @param int   $status The response status
     * 
     * @return \Illuminate\Http\Response
     */
    public function response(array $data, $status = 200)
    {
        return (response()->json(['records' => $data], $status));
    }
}
