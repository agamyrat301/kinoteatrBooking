<?php

namespace App\Http\Controllers;
use App\Spot;
use Illuminate\Http\Request;

class SpotController extends Controller
{
    public function index()
    {
        return view('admin.spots.index');
    }

  
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

 
    public function show(Spot $spot)
    {
        //
    }

  
    public function edit(Spot $spot)
    {
        //
    }

  
    public function update(Request $request, Spot $spot)
    {
        //
    }


    public function destroy(Spot $spot)
    {
        //
    }
}
