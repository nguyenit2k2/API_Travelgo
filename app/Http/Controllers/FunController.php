<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Fun;

use DB;

class FunController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return Fun::orderBy('id','asc')->get();
        }
        else{
            return Fun::where('id',$id)>get();
        }
    }
    public function create (Request $req){
        try { 
            $shopping = new Fun();
            $shopping->place = $req->input('place');
            $shopping->title = $req->input('title');
            $shopping->content = $req->input('content');
            $shopping->image = $req->input('image');
            $shopping->price = $req->input('price');
            $shopping->time = $req->input('time');
            $shopping->save();
            return $shopping;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $shopping = Fun::find($id);
            if($shopping!=null){
                $shopping = new Fun();
                $shopping->place = $req->input('place');
                $shopping->title = $req->input('title');
                $shopping->content = $req->input('content');
                $shopping->image = $req->input('image');
                $shopping->price = $req->input('price');
                $shopping->time = $req->input('time');
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
            $shopping = Fun::find($id);
            if($shopping!=null){
                $shopping->delete();
                return $shopping;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
