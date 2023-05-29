<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use DB;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return Restaurant::orderBy('id','asc')->get();
        }
        else{
            return Restaurant::find($id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $restaurant = new Restaurant();
            $restaurant->title = $req->input('title');
            $restaurant->image = $req->input('image');
            $restaurant->content = $req->input('content');
            $shopping->content = $req->input('bigcontentcontent');
            $shopping->image = $req->input('price');
            $restaurant->save();
            return $restaurant;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { $restaurant = Restaurant::find($id);
            if($restaurant!=null){
            $restaurant->title = $req->input('title');
            $restaurant->image = $req->input('image');
            $restaurant->content = $req->input('content');
            $shopping->content = $req->input('bigcontentcontent');
            $shopping->image = $req->input('price');
            $restaurant->save();
            return $restaurant;
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
            $restaurant = Restaurant::find($id);
            if($restaurant!=null){
                $restaurant->delete();
                return $restaurant;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
