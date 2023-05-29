<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContentFood;

use DB;

class ContentFoodController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return ContentFood::orderBy('id','asc')->get();
        }
        else{
            return ContentFood::where('id' ,$id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $contentfood = new ContentFood();
            $contentfood->place = $req->input('place');
            $contentfood->title = $req->input('title');
            $contentfood->content = $req->input('content');
            $contentfood->content = $req->input('bigcontent');
            $contentfood->image = $req->input('image');
            $contentfood->time = $req->input('time');
            $contentfood->price = $req->input('price');
            $contentfood->save();
            return $contentfood;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $contentfood = ContentFood::find($id);
            if($contentfood!=null){
                $contentfood->place = $req->input('place');
                $contentfood->title = $req->input('title');
                $contentfood->content = $req->input('content');
                $contentfood->content = $req->input('bigcontent');
                $contentfood->image = $req->input('image');
                $contentfood->time = $req->input('time');
                $contentfood->price = $req->input('price');
                $contentfood->save();
                return $contentfood;
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
            $contentfood = ContentFood::find($id);
            if($contentfood!=null){
                $contentfood->delete();
                return $contentfood;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
