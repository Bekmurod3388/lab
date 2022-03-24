<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Api;
use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function index(){
        return Api::select('api')->get();
    }
}
