<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

namespace App\Http\Controllers;
use Swift_Mailer;
use Swift_Message;
use Swift_SmtpTransport;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Tour;
use App\Models\Flight;
use App\Models\BookingFlight;
use App\Models\BookingCar;
use App\Models\RentCar;
class TourController extends Controller
{
    public function saveTour(Request $request)
    {
        $tour = new Tour;
        $tour->user_id = $request->input('user_id');
        $tour->name = $request->input('name');
        $tour->image = $request->input('image');
        $tour->property_id = $request->input('property_id');
        $tour->adults = $request->input('adults');
        $tour->children = $request->input('children');
        $tour->start_date = $request->input('startDate');
        $tour->end_date = $request->input('endDate');
        $tour->rooms = $request->input('rooms');
        $tour->old_price = $request->input('oldPrice');
        $tour->new_price = $request->input('newPrice');
        $tour->rating = $request->input('rating');
        $tour->save();
        
        return response()->json(['success' => true]);
        
    }
    public function cartHotel($id=null){
        if($id == null){
            return Tour::orderby('id','asc')->get();
        }
        else{
            return Tour::where('user_id',$id)->get();
        }
    }
    public function cartFlight($id=null){
        if($id == null){
            return BookingFlight::with(['flight'])->orderby('id','asc')->get();
        }
        else{
            return BookingFlight::with(['flight'])->where('user_id',$id)->get();
        }
    }
    public function cartCar($id=null){
        if($id == null){
            return RentCar::join('bookingcar', 'bookingcar.id', '=', 'rentcar.car_id')
                    ->join('locations','bookingcar.location_id','=','locations.id')
                    ->select('rentcar.id', 'rentcar.car_id', 'rentcar.user_id', 'rentcar.startDate', 'rentcar.endDate', 'rentcar.total', 'rentcar.type',
                            'bookingcar.img','bookingcar.name','bookingcar.price','bookingcar.quantity','bookingcar.seats',
                             'locations.place')
                    ->orderBy('rentcar.id', 'desc')
                    ->get();
        }
        else{
            return RentCar::where('user_id',$id)->join('bookingcar', 'bookingcar.id', '=', 'rentcar.car_id')
                    ->join('locations','bookingcar.location_id','=','locations.id')
                    ->select('rentcar.id', 'rentcar.car_id', 'rentcar.user_id', 'rentcar.startDate', 'rentcar.endDate', 'rentcar.total', 'rentcar.type',
                            'bookingcar.img','bookingcar.name','bookingcar.price','bookingcar.quantity','bookingcar.seats',
                             'locations.place')
                    ->orderBy('rentcar.id', 'desc')
                    ->get();
        }
    }
    public function flightLocation(){
        $locations = Location::pluck('place');
        return $locations;
    }
    public function flight(){
        return Flight::orderby('id','asc')->get();
    }
    public function save_flight(Request $request){
        $bookflight = new BookingFlight;
        $bookflight->adult = $request->input('adult');
        $bookflight->children = $request->input('children');
        $bookflight->user_id = $request->input('user_id');
        $bookflight->flight_id = $request->input('flight_id');
        $bookflight->total = $request->input('total');

        $bookflight->save();

        return response()->json(['success' => true]);
    }
    public function listCar(Request $request){
        return BookingCar::with(['location' => function ($query) {
            $query->select('id', 'place');
        }])->orderBy('quantity', 'desc')->get(['id', 'name', 'img','price', 'quantity', 'seats', 'location_id']);
    }
    public function save_car(Request $request){
        $bookcar = new RentCar;
        $bookcar->car_id = $request->input('car_id');
        $bookcar->user_id = $request->input('user_id');
        $bookcar->startDate = $request->input('startDate');
        $bookcar->endDate = $request->input('endDate');
        $bookcar->total = $request->input('total');
        $checktype = $request->input('select');
        if ($checktype==0){
            $bookcar->type = "Self-Driving";
        }else{
            $bookcar->type = "Manual";
        }
        $bookcar->save();

        return response()->json(['success' => true]);
    }
    public function deleteBookingHotel($id){
        $result = Tour::where('id',$id)->first();
        if($result){
            $result->delete();
            return response()->json(['success' => true]);
        }
    }
    public function deleteBookingFlight($id){
        $result = BookingFlight::where('id',$id)->first();
        if($result){
            $result->delete();
            return response()->json(['success' => true]);
        }
    }
    public function deleteRentCar($id){
        $result = RentCar::where('id',$id)->first();
        if($result){
            $result->delete();
            return response()->json(['success' => true]);
        }
    }

}