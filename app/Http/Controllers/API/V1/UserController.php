<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\V1\Abstraction\UserServiceI;

class UserController extends Controller
{
    private $service;

    function __construct(UserServiceI $service)
    {
        $this->service = $service;
    }

    public function index(Request $request)
    {
        $filters = $request->toArray();
        [$data, $statusCode] = $this->service->index($filters);
        return response()->json($data, $statusCode);
        
    }
}
