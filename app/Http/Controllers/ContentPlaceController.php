<?php

namespace App\Http\Controllers;

use App\Models\ContentPlace;

use Illuminate\Http\Request;

class ContentPlaceController extends Controller
{
    public function index($id = null){
        if($id==null){
            return ContentPlace::orderBy('id','asc')->get();
        }
        else{
            return ContentPlace::where('id',$id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $place = new ContentPlace();
            $place->title = $req->input('title');
            $place->image = $req->input('image');
            $place->content = $req->input('content');
            $place->place = $req->input('place');
            $place->content = $req->input('bigcontent');

            $place->save();
            return $place;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $place = ContentPlace::find($id);
            if($place!=null){
                $place->title = $req->input('title');
                $place->image = $req->input('image');
                $place->content = $req->input('content');
                $place->place = $req->input('place');
                $place->content = $req->input('bigcontent');
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
            $place = ContentPlace::find($id);
            if($place!=null){
                $place->delete();
                return $place;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
