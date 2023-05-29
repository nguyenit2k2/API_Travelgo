<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContentFood;
use App\Models\ContentPlace;
use App\Models\Fun;
use App\Models\User;
use App\Models\HomeStay;
use App\Models\ContentRestaurant;
use App\Models\Hotel;
use App\Models\Shopping;
use App\Models\Tour;
use Session;
use Redirect;
use DB;
session_start();
class AdminController extends Controller
{
    //
    public function table(){
            $shop = Shopping::orderBy('id','asc')->get();
            $food = ContentFood::orderBy('id','asc')->get();
            $place = ContentPlace::orderBy('id','asc')->get();
            $fun = Fun::orderBy('id','asc')->get();
            $homestay = HomeStay::orderBy('id','asc')->get();
            $hotel = Hotel::orderBy('id','asc')->get();
            $res = ContentRestaurant::orderBy('id','asc')->get();
            return view('admintable')->with('food',$food)->with('place',$place)->with('shop',$shop)->with('fun',$fun)->with('homestay',$homestay)->with('hotel',$hotel)->with('res',$res);
        }
    public function placeindex(){
        $place = ContentPlace::orderBy('id','asc')->get();
        return view('placetable')->with('place',$place);
    }
    public function foodindex(){
        $food = ContentFood::orderBy('id','asc')->get();
        return view('foodtable')->with('food',$food);
    }
    public function resindex(){
        $res = ContentRestaurant::orderBy('id','asc')->get();
        return view('restable')->with('res',$res);
    }
    public function shopindex(){
        $shop = Shopping::orderBy('id','asc')->get();
        return view('shoptable')->with('shop',$shop);
    }
    public function hotelindex(){
        $hotel = Hotel::orderBy('id','asc')->get();
        return view('hoteltable')->with('hotel',$hotel);
    }
    public function funindex(){
        $fun = Fun::orderBy('id','asc')->get();
        return view('funtable')->with('fun',$fun);
    }
    public function homestayindex(){
        $homestay = HomeStay::orderBy('id','asc')->get();
        return view('homestaytable')->with('homestay',$homestay);
    }
    public function userindex($id=null){
        if($id){
        $hotel= Tour::where('user_id',$id)->orderBy('id','desc')->get();
        $user = User::orderBy('id','asc')->get();
        
    }else{
        $user = User::orderBy('id','asc')->get();
        $hotel= Tour::where('user_id',1)->orderBy('id','desc')->get();
    }
    return view('usertable')->with('user',$user)->with('cart',$hotel);
    }
    // public function cartindex($id){
    //     $hotel= Tour::where('user_id',$id)->orderBy('id','desc')->get();
    //     $user = User::orderBy('id','asc')->get();
    //     return view('usertable')->with('user',$user)->with('cart',$hotel);
    // }
    public function insertplace (Request $req){
        try { 
            $place = new ContentPlace();
            $place->title = $req->input('title');
            $place->image = $req->input('image');
            $place->content = $req->input('content');
            $place->place = $req->input('place');
            $place->bigcontent = $req->input('bigcontent');
            $place->save();
            Session::put('message','Thêm điểm đến thành công');
            return Redirect::to('addplace');
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function insertfood (Request $req){
        try { 
            $food = new ContentFood();
            $food->title = $req->input('title');
            $food->image = $req->input('image');
            $food->content = $req->input('content');
            $food->place = $req->input('place');
            $food->bigcontent = $req->input('bigcontent');
            $food->time = $req->input('time');
            $food->price = $req->input('price');
            $food->save();
            Session::put('message','Thêm món ăn thành công');
            return Redirect::to('addfood');
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function inserthotel (Request $req){
        try { 
            $hotel = new Hotel();
            $hotel->title = $req->input('title');
            $hotel->image = $req->input('image');
            $hotel->content = $req->input('content');
            $hotel->place = $req->input('place');
            $hotel->bigcontent = $req->input('bigcontent');
            $hotel->price = $req->input('price');
            $hotel->save();
            Session::put('message','Thêm khách sạn thành công');
            return Redirect::to('addhotel');
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function insertres (Request $req){
        try { 
            $res = new ContentRestaurant();
            $res->title = $req->input('title');
            $res->image = $req->input('image');
            $res->content = $req->input('content');
            $res->place = $req->input('place');
            $res->bigcontent = $req->input('bigcontent');
            $res->price = $req->input('price');
            $res->time = $req->input('time');
            $res->save();
            Session::put('message','Thêm nhà hàng thành công');
            return Redirect::to('addres');
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function insertfun(Request $req){
        try { 
            $fun = new Fun();
            $fun->title = $req->input('title');
            $fun->image = $req->input('image');
            $fun->content = $req->input('content');
            $fun->place = $req->input('place');
            $fun->price = $req->input('price');
            $fun->time = $req->input('time');
            $fun->save();
            Session::put('message','Thêm khu vui chơi thành công');
            return Redirect::to('addfun');
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function insertshop(Request $req){
        try { 
            $shop = new Shopping();
            $shop->title = $req->input('title');
            $shop->image = $req->input('image');
            $shop->content = $req->input('content');
            $shop->bigcontent = $req->input('bigcontent');
            $shop->place = $req->input('place');
            $shop->save();
            Session::put('message','Thêm khu mua sắm thành công');
            return Redirect::to('addshop');
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function inserthome(Request $req){
        try { 
            $home = new HomeStay();
            $home->title = $req->input('title');
            $home->image = $req->input('image');
            $home->content = $req->input('content');
            $home->bigcontent = $req->input('bigcontent');
            $home->place = $req->input('place');
            $home->price = $req->input('price');
            $home->save();
            Session::put('message','Thêm homestay thành công');
            return Redirect::to('addhomestay');
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function deleteplace ($id, Request $req){
        try { 
            $place = ContentPlace::find($id);
            if($place!=null){
                $place->delete();
                Session::put('message','Xóa món ăn thành công');
                return Redirect::to('place');
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function deletefood ($id, Request $req){
        try { 
            $food = ContentFood::find($id);
            if($food!=null){
                $food->delete();
                Session::put('message','Xóa món ăn thành công');
                return Redirect::to('food');
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function deletefun ($id, Request $req){
        try { 
            $fun = Fun::find($id);
            if($fun!=null){
                $fun->delete();
                Session::put('message','Xóa khu vui chơi thành công');
                return Redirect::to('fun');
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function deleteres ($id, Request $req){
        try { 
            $res = ContentRestaurant::find($id);
            if($res!=null){
                $res->delete();
                Session::put('message','Xóa nhà hàng thành công');
                return Redirect::to('res');
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function deleteshop ($id, Request $req){
        try { 
            $shop = Shopping::find($id);
            if($shop!=null){
                $shop->delete();
                Session::put('message','Xóa khu vui chơi thành công');
                return Redirect::to('shop');
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function deletehome ($id, Request $req){
        try { 
            $home = HomeStay::find($id);
            if($home!=null){
                $home->delete();
                Session::put('message','Xóa homestay thành công');
                return Redirect::to('home');
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    public function deletehotel ($id, Request $req){
        try { 
            $hotel= Hotel::find($id);
            if($hotel!=null){
                $hotel->delete();
                Session::put('message','Xóa khách sạn thành công');
                return Redirect::to('hotel');
            }
        } catch(Throwable $err){
            return $err->getMessage();
        }
    }
    
    
}
