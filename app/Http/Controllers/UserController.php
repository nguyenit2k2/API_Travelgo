<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\User;
class UserController extends Controller
{
    public function index($id = null){
        if($id==null){
            return User::orderby('id','asc')->get();
        }else{
            return User::where('id',$id)->first();
        }
    }
}
