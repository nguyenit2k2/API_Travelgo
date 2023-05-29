<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Shopping;

use DB;

class ShoppingController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return Shopping::orderBy('id','asc')->get();
        }
        else{
            return Shopping::where('id',$id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $shopping = new Shopping();
            $shopping->place = $req->input('place');
            $shopping->title = $req->input('title');
            $shopping->content = $req->input('content');
            $shopping->image = $req->input('image');
            $shopping->bigcontent = $req->input('bigcontent');
            $shopping->save();
            return $shopping;
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function update ($id, Request $req){
        try { 
            $shopping = Shopping::find($id);
            if($shopping!=null){
                $shopping = new Shopping();
                $shopping->place = $req->input('place');
                $shopping->title = $req->input('title');
                $shopping->content = $req->input('content');
                $shopping->image = $req->input('image');
                $shopping->bigcontent = $req->input('bigcontent');
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
            $shopping = Shopping::find($id);
            if($shopping!=null){
                $shopping->delete();
                return $shopping;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
