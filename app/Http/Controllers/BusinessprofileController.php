<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\businessprofile;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\File;


class BusinessprofileController extends Controller
  
{

                
      public function __construct()
          {
        $this->middleware('auth');
          }

          
      public function index()
            {
              
                

                return view('continue_reg');
            }

            public function storeprofileimage(){
               
                    $image  = request()->file('profile_image');
                    $newfilename="profile_logo_".request()->user()->name.time();
                    $newfilename = preg_replace('/\s+/', '_', $newfilename);
                    $filename= $newfilename.'.'.request()->profile_image->getClientOriginalExtension();
                    
                   
    
                    $image_resize = Image::make($image->getRealPath());              
                    $image_resize->resize(100, 100);
                    $image_resize->save(public_path('storage/images/profile_images/'.$filename ));
    
                    return $filename;
             
                
          
                 

            }
            

           

            protected function validaterequest(){
                request()->validate([
                    'profile_image' => [ 'nullable','mimes:tiff,jpeg,jpg,png','image','max:5048',],
                    'business_name' => ['required','string', 'max:255',],
                    'business_email' => ['email', 'max:255'],
                    'business_address' => ['required','string', 'max:255'],
                    'contact_number' => ['required', 'numeric',],
                    'location' => ['required','integer'],
                    'category' => ['required', 'integer'],
                    'others' => ['required_if:category,13']
                ]  );

            }

            public function store(Request $request, businessprofile $Bprof){           
                
                
               
            
                 
                    $this->validaterequest();
                
               
           
                    $Bprof->create([
                    
                     'user_id' => auth()->user()->id,
                    'category_id'=>request()->category,
                    'business_name'=>request()->business_name,
                    'contact_number'=>request()->contact_number,
                    'email' =>request()->business_email,
                    'address' =>request()->business_address,
                    'others' =>request()->others,
                    'location_id' =>request()->location,
                    'profile_image'=> request()->hasFile('profile_image') ? $this->storeprofileimage() : NULL

                 

            ]);
            

            if( Request::capture()->expectsJson()){
                return;
            }else{
                return redirect(RouteServiceProvider::HOME); 
            }
            


              
    }

    public function update(){
        
       
        $businessprofile =  auth()->user()->businessprofile;
       
        
        if(request()->hasFile('checkprofile_image')){
            $this->validaterequest();

            File::delete(public_path('storage/images/profile_images/'.$businessprofile->profile_image));

            $businessprofile->update(
                [
                    'profile_image'=>$this->storeprofileimage(),
                    'user_id' => auth()->user()->id,
                    'category_id'=>request()->category,
                    'business_name'=>request()->business_name,
                    'contact_number'=>request()->contact_number,
                    'email' =>request()->business_email,
                    'address' =>request()->business_address,
                    'others' =>request()->others?? null,
                    'location_id' =>request()->location

                 

            ]
                );






           

           


            






            return 'profile-updated';
        }else{




            request()->validate([
               
                'business_name' => ['required','string', 'max:255',],
                'business_email' => ['email', 'max:255'],
                'business_address' => ['required','string', 'max:255'],
                'contact_number' => ['required', 'numeric',],
                'location' => ['required','integer'],
                'category' => ['required', 'integer'],
                'others' => ['required_if:category,13']
            ]  );

            $businessprofile->update(
                [
               
                    'user_id' => auth()->user()->id,
                    'category_id'=>request()->category,
                    'business_name'=>request()->business_name,
                    'contact_number'=>request()->contact_number,
                    'email' =>request()->business_email,
                    'address' =>request()->business_address,
                    'others' =>request()->others?? null,
                    'location_id' =>request()->location

                 

            ]
                );
            return 'no profile seen';
        }
        
        
        // return [
           
        //     'file_to_delete'=> public_path('storage/images/profile_images/'.request()->profile_image)
            
        // ];



    }
        

}

