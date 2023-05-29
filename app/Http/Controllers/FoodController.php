<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Food;

use DB;

class FoodController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return Food::orderBy('id','asc')->get();
        }
        else{
            return Food::find($id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $shopping = new Food();
            $shopping->place = $req->input('place');
            $shopping->title = $req->input('title');
            $shopping->content = $req->input('content');
            $shopping->image = $req->input('image');

            $shopping->save();
            return $shopping;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $shopping = Food::find($id);
            if($shopping!=null){
                $shopping = new Food();
                $shopping->place = $req->input('place');
                $shopping->title = $req->input('title');
                $shopping->content = $req->input('content');
                $shopping->image = $req->input('image');

                $shopping->save();
                return $shopping;
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
            $shopping = Food::find($id);
            if($shopping!=null){
                $shopping->delete();
                return $shopping;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
