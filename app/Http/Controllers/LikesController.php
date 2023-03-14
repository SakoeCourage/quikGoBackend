<?php 
namespace App\Http\Controllers;

use App\Events\Sendusernotification;
use App\Events\Usernotification;
use App\Models\Ad;
use App\Models\User;
use App\Notifications\Adliked;
use Illuminate\Http\Request;


class LikesController extends Controller  
{
   
    public function index( Request $request){
        
       
        $user = User::find($request->user_id);
        $ad = Ad::find($request->ad_id);
        $author_id = $request->author_id;

        if(!$user->hasLiked($ad)){
            $ad->user->notify(new Adliked($user,$ad));
        }
        
        if($user->toggleLike($ad)){
            broadcast(new Usernotification($author_id));
           
            return([
                'toggle' => $ad->likers
    
    
            ]); 

        }
       

    }

    public function getLikers(Request $request){

        $ad = Ad::find($request->ad_id);
        return([
            'likers' => $ad->likers


        ]); 



    }

    
}