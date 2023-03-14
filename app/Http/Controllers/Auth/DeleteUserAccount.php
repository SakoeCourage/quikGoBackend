<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class DeleteUserAccount extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    public function deleteaccount(){
        if(Hash::check(request()->current_password ,auth()->user()->password)){

            auth()->user()->delete();
        
            return "deleted";

        }else{
            throw ValidationException::withMessages(['current_password'=> 'password is doesn\'t match our record ']);
        }
        
      

        

    }

    
}
