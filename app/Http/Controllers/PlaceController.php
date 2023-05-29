<?php

namespace App\Http\Controllers;

use App\Models\Place;
use DB;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return Place::orderBy('id','asc')->get();
        }
        else{
            return Place::find($id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $place = new Place();
            $place->title = $req->input('title');
            $place->image = $req->input('image');
            $place->content = $req->input('content');

            $place->save();
            return $place;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $place = Place::find($id);
            if($place!=null){
                $place->title = $req->input('title');
                $place->image = $req->input('image');
                $place->content = $req->input('content');
                $place->save();
                return $place;
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
            $place = Place::find($id);
            if($place!=null){
                $place->delete();
                return $place;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
