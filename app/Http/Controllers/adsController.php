<?php

namespace App\Http\Controllers;

use App\Events\NewAdAdded;
use App\Events\NewAddAdded;
use App\Models\Ad;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;




use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class adsController extends Controller
{

    public function index()
    {

        return view('postad');
    }

    public    function storeimage($imagefile, $index)
    {
        $date = Carbon::now();
        $image    = $imagefile;
        $newfilename = "ads_" . $index . request()->user()->name . time();
        $newfilename = preg_replace('/\s+/', '_', $newfilename);
        $filename = $newfilename . '.' . $image->getClientOriginalExtension();
        $mypath = 'public/images/ads/' . $date->year . '/' . $date->monthName;


        if (!Storage::exists($mypath)) {
            Storage::makeDirectory($mypath, 0775, true, true);
        }


        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(600, 500);

        $image_resize->save(public_path('storage/images/ads/' . $date->year . '/' . $date->monthName . '/' . $filename));

        return ($filename);
    }


    public function store(Request $request, Ad $ad)
    {


        $request->validate([
            'first_image' => ['required', 'mimes:tiff,jpeg,jpg,png', 'image', 'max:5048'],
            'second_image' => ['required', 'mimes:tiff,jpeg,jpg,png', 'image', 'max:5048'],
            'third_image' => ['nullable', 'mimes:tiff,jpeg,jpg,png', 'image', 'max:5048'],
            'fourth_image' => ['nullable', 'mimes:tiff,jpeg,jpg,png', 'image', 'max:5048'],
            'description' => ['nullable', 'string', 'between:30,300'],
            'item_name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'contact_number' => ['required', 'numeric'],
            'location' => ['required', 'integer'],
            'category' => ['required', 'integer'],
            'others' => ['required_if:category,13'],
            'subcategory'=>['required','integer'],
            'condition'=>['required', 'string']
        ]);


        $ad->create([
            'user_id' => request()->user_id ?? auth()->user()->id,
            'location_id' => request()->location,
            'category_id' => request()->category,
            'image_one' => $this->storeimage($request->file('first_image'), 'image_one'),
            'image_two' => $this->storeimage($request->file('second_image'), 'image_two'),
            'image_three' => request()->hasFile('third_image') ? $this->storeimage($request->file('third_image'), 'image_three') : NULL,
            'image_four' => request()->hasFile('fourth_image') ? $this->storeimage($request->file('fourth_image'), 'image_four') : NULL,
            'item_name' => request()->item_name,
            'others' => request()->others,
            'price' => request()->price,
            'contact_number' => request()->contact_number,
            'description' => request()->description,
            'subcategory_id'=> request()->subcategory,
            'condition' => request()->condition






        ]);

        broadcast(new NewAdAdded());

        if (Request::capture()->expectsJson()) {
            return;
        } else {
            return redirect('/ads');
        }
    }

    public function getads()
    {


        $ad = Ad::query();
     


        if (Request::capture()->expectsJson()) {

            return Ad::filter(request(['search', 'category', 'location', 'price', 'order','subcategory','condition']))->with(["location", "category", "likers","subcategory"])->latest()->paginate(12)->withQueryString();
        } else {
            return view('browseads')->with([
                'ads' => $ad->filter(request(['search', 'category', 'location', 'price', 'order']))->with(["location", "category"])->latest()->paginate(10)->withQueryString()

            ]);
        }
    }

    public function deletead(){
        $ad= Ad::find(request()->ad_id);
        $year = Carbon::createFromFormat('Y-m-d H:i:s',$ad->created_at)->format('Y');
        $month = Carbon::createFromFormat('Y-m-d H:i:s',$ad->created_at)->format('F');
        
      

        $image_one = public_path('storage/images/ads/'.$year.'/'.$month.'/'.$ad->image_one);
        $image_two = public_path('storage/images/ads/'.$year.'/'.$month.'/'.$ad->image_two);
        $image_three = public_path('storage/images/ads/'.$year.'/'.$month.'/'.$ad->image_three);
        $image_four = public_path('storage/images/ads/'.$year.'/'.$month.'/'.$ad->image_four);
   

        File::delete($image_one,$image_two,$image_three,$image_four);
        $ad->delete();
            return([
                'deleted' => 'deleted',
            ]);

        

    }


   
}
