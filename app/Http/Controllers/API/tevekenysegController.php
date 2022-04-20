<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\tevekenysegek;
use Illuminate\Http\Request;

class tevekenysegController extends Controller
{
    public function index()
    {
        return response()->json(tevekenysegek::all());
    }

    
}
