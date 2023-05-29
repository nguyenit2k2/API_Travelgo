<?php

namespace App\Http\Controllers;

use App\Models\Location;

class LocationController extends Controller
{
    public function index($id=null)
    {
        $locations = Location::with('properties.photos', 'properties.rooms')->get();

        return response()->json($locations);
    }
}