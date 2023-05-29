<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hotel;

use DB;

class HotelController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return Hotel::orderBy('id','asc')->get();
        }
        else{
            return Hotel::where('id',$id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $shopping = new Hotel();
            $shopping->place = $req->input('place');
            $shopping->title = $req->input('title');
            $shopping->content = $req->input('content');
            $shopping->image = $req->input('image');
            $shopping->content = $req->input('bigcontentcontent');
            $shopping->image = $req->input('price');
            $shopping->save();
            return $shopping;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $shopping = Hotel::find($id);
            if($shopping!=null){
                $shopping = new Hotel();
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
            $shopping = Hotel::find($id);
            if($shopping!=null){
                $shopping->delete();
                return $shopping;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
