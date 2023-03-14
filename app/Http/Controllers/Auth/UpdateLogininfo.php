<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class UpdateLogininfo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    protected function update(){

        request()->validate([
            'name' => ['required', 'string', 'max:255','unique:users,name,'.auth()->user()->id, ],
            'email' => ['required' , 'string', 'email', 'max:255', 'unique:users,email,'.auth()->user()->id],
            'current_password' => ['required', 'string',],
            'password'=>['nullable','string','min:8','confirmed']
           

        ]);

        if(Hash::check(request()->current_password ,auth()->user()->password)){

            auth()->user()->update([
                    'name' => request()->name,
                    'email' =>request()->email,
                    'password'=> Hash::make(request()->password ?? request()->current_password)


            ]);
            


        }else{
            throw ValidationException::withMessages(['current_password'=> 'password is doesn\'t match our record ']);
        } 
        
    
    }
}
