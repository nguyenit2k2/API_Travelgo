<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HomeStay;

use DB;

class HomeStayController extends Controller
{
    //
    public function index($id = null){
        if($id==null){
            return HomeStay::orderBy('id','asc')->get();
        }
        else{
            return HomeStay::where('id',$id)->get();
        }
    }
    public function create (Request $req){
        try { 
            $shopping = new HomeStay();
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
            $shopping = HomeStay::find($id);
            if($shopping!=null){
                $shopping = new HomeStay();
                $shopping->place = $req->input('place');
                $shopping->title = $req->input('title');
                $shopping->content = $req->input('content');
                $shopping->image = $req->input('image');
                $shopping->content = $req->input('bigcontentcontent');
                $shopping->image = $req->input('price');
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
            $shopping = HomeStay::find($id);
            if($shopping!=null){
                $shopping->delete();
                return $shopping;
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
}
