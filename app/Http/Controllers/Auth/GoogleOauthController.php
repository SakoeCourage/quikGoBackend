<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleOauthController extends Controller
{
   public function index(){
    return ([
        'path' => urldecode(Socialite::driver('google')->redirect())
    ]);

   }
    public function getUser(){
        $googleuser = Socialite::driver('google')->with(['access_type' => 'offline'])->stateless()->user();
     
        $user_email_exist =  User::where('email', $googleuser->email)->first();
        $username_exist =  User::where('name', $googleuser->name)->first();
        if($user_email_exist && $user_email_exist->password !=NULL){
                 throw \Illuminate\Validation\ValidationException::withMessages(
                     [
                        'account' => $user_email_exist->email
                     ]
                                                                            
                );
     
        }elseif($username_exist && $username_exist->google_id != $googleuser->id  ){

            throw \Illuminate\Validation\ValidationException::withMessages(
                [
                   'account' => $username_exist->name
                ]
                                                                       
                );
        }else{
          
         $user = User::where('google_id', $googleuser->id)->first();
         if ($user) {
             $user->update([
                 'github_token' => $googleuser->token,
                 'github_refresh_token' => $googleuser->refreshToken,
             ]);
         } else {
             $user = User::create([
                 'name' => $googleuser->name,
                 'email' => $googleuser->email,
                 'google_id' => $googleuser->id,
                 'google_token' => $googleuser->token,
                 'google_refresh_token' => $googleuser->refreshToken,
             ]);
         }
      
         Auth::login($user);
      
     
        }
     
         
         
         return 'created';
     
    }
}
