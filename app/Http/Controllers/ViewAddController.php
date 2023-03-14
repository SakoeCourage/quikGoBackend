<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Location;
use App\Models\subcategories;

class ViewAddController extends Controller
{
    public function index(Ad $ad)
    {

           
        $adname = Ad::where('slug',$ad);

        if ( Request::capture()->expectsJson()  ){
            return (
           [ 'ad' => $ad,
            'user'=> $ad->user,
            'likes' => $ad->likers,
            'liked_by' => auth()->user() ? $ad->isLikedBy(auth()->user()) : false, 
            'location' => Location::find($ad->location_id)->location,
            'category' => Category::find($ad->category_id)->category,
            'related' => Ad::related_ads($ad->item_name,$ad->category_id)->except($ad->id),
            'subcategory' => subcategories::find($ad->subcategory_id)->subcategory_name ?? null

            ]
        );

        }else{
           
        return view('viewad')->with([
            'ad' => $ad,
            'location' => Location::find($ad->location_id)->location,
            'category' => Category::find($ad->category_id)->category
        ]);}
    }
}
