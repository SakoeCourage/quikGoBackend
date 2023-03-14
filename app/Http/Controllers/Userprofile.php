<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class Userprofile extends Controller
{
   
    public function index(User $user ){
            $businessprofile = $user->businessprofile;

            if(request::capture()->expectsjson()){
              return([
                "user" => $user,
                "ads" => $user->ads()->orderBy("created_at","desc")->paginate(10),
                "location"=>$businessprofile ? Location::find($user->businessprofile->location_id)->location : null,
                "category"=>$businessprofile ?Category::find($user->businessprofile->category_id)->category: null
            ]);


            }else{
                return view('userprofile')->with([
                    "user" => $user,
                    "ads" => $user->ads->sortByDesc('created_at'),
                    "location"=>Location::find($user->businessprofile->location_id)->location,
                    "category"=>Category::find($user->businessprofile->category_id)->category
    
                ]);

            }

           

    }



}
