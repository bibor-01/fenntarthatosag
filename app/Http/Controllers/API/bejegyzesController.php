<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Bejegyzesek;
use App\Models\tevekenysegek;
use Illuminate\Http\Request;

class bejegyzesController extends Controller
{
    public function index()
    {
        $bejegyzesek = Bejegyzesek::all();
        return response()->json(Bejegyzesek::all());
    }
    public function store(Request $request)
    {
        $bejegyzes = new Bejegyzesek();
        $bejegyzes->tevekenyseg_id = $request->tevekenyseg_id;
        $bejegyzes->osztaly_id = $request->osztaly_id;
        $bejegyzes->allapot = 0;
        $bejegyzes->save();
        $response = array(
            'tev' => $request->tevekenyseg_id,
            'oszt' => $request->osztaly_id,
            'all' => $request->allapot,
            'msg'    => 'Setting created successfully',
        );

        return ($response);
    }
    public function megjelenit()
    {
        $bejegyzesek = bejegyzesek::all();
        $tevekenyseg = tevekenysegek::all();
        return view('welcome', compact('bejegyzesek', 'tevekenyseg'));
    }
    public function show($id)
    {
        $bejegyzesek = Bejegyzesek::where('osztaly_id','=',$id)->get();
       
        return $bejegyzesek;
    }
}
