<?php

namespace App\Http\Controllers\Api;

use App\Support\Response;
use App\Support\Transform;
use App\Http\Controllers\Controller;
// use League\Fractal\Manager;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $response;

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        // $manager = new Manager();

        // $this->response = new Response(response(), new Transform($manager));
    }
}
