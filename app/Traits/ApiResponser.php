<?php
namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Pagination\LengthAwarePaginator;

trait ApiResponser
{

    static function successResponse($data, $message = null, $code = 200)
    {
        return response()->json(['status' => 'Success', 'message' => $message, 'data' => $data], $code);
    }

    protected function errorResponse($message = null, $code = 200)
    {
        return response()->json(['status' => 'Success', 'message' => $message,], $code);
    }
}
