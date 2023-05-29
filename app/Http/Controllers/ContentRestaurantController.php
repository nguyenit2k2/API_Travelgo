<?php

namespace App\Http\Controllers;

use App\Models\ContentRestaurant;

use Illuminate\Http\Request;

class ContentRestaurantController extends Controller
{
    public function index($id = null){
        if($id==null){
            return ContentRestaurant::orderBy('id','asc')->get();
        }
        else{
            return ContentRestaurant::where('id',$id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $restaurant = new ContentRestaurant();
            $restaurant->title = $req->input('title');
            $restaurant->image = $req->input('image');
            $restaurant->content = $req->input('content');
            $restaurant->place = $req->input('place');
            $restaurant->time = $req->input('time');
            $restaurant->price = $req->input('price');
            $restaurant->bigcontent = $req->input('bigcontent');
            $restaurant->save();
            return $restaurant;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $restaurant = ContentRestaurant::find($id);
            if($restaurant!=null){
                $restaurant->title = $req->input('title');
                $restaurant->image = $req->input('image');
                $restaurant->content = $req->input('content');
                $restaurant->bigcontent = $req->input('bigcontent');
                $restaurant->place = $req->input('place');
                $restaurant->time = $req->input('time');
                $restaurant->price = $req->input('price');
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
            $restaurant = ContentRestaurant::find($id);
            if($restaurant!=null){
                $restaurant->delete();
                return $restaurant;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
