<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use DB;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return Vehicle::orderBy('id','asc')->get();
        }
        else{
            return Vehicle::find($id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $vehicle = new Vehicle();
            $vehicle->type = $req->input('type');
            $vehicle->image = $req->input('image');
            $vehicle->content = $req->input('content');

            $vehicle->save();
            return $vehicle;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $vehicle = Vehicle::find($id);
            if($vehicle!=null){
                $vehicle->type = $req->input('type');
                $vehicle->image = $req->input('image');
                $vehicle->content = $req->input('content');

                $vehicle->save();
                return $vehicle;
            }
            else{
                return "data not found";
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function delete ($id, Request $req){
        try { 
            $vehicle = Vehicle::find($id);
            if($vehicle!=null){
                $vehicle->delete();
                return $vehicle;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
