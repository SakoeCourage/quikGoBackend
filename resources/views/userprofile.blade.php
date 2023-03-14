@include('components.filtercomponents')
@extends('layout')
@section('content')





    
    <div class="w-full text-white">
        
   

    <div class="container mx-auto my-5 mt-12 md:p-5">
        <div class="lg:flex no-wrap md:-mx-2 ">
            <!-- Left Side -->
            <div class="w-full lg:w-4/12 md:mx-2 mb-2">
                <!-- Profile Card -->
                <div class="bg-white px-3 border-orange-200 border-b-4 flex flex-col text-sm" x-data="{opened:false}">
                  
                    <div class="  image h-16 w-16 overflow-hidden shadow-outline-orange rounded-full self-center transform -translate-y-10">
                        <img class=" h-full w-full mx-auto rounded-full"
                            
                            src="{{ asset('profileimages/'.$user->businessprofile->profile_image) }}"
                            
                            alt="">
                    </div>
                   <div class="transform -translate-y-8  ">

                     <h1 class="text-gray-900 font-bold text-xl leading-8 my-1 block text-center">{{ $user->name }}</h1>
                    <h3 class="text-gray-600 font-lg text-semibold leading-6 text-center ">Owns {{ $user->businessprofile->business_name }}</h3>
                    
                    <ul
                        class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                        <li class="flex items-center py-3">
                            <span>Rating</span>
                            <span class="ml-auto"><span
                                    class="bg-orange-300 py-1 px-2 rounded text-gray-700 text-sm">5 stars</span></span>
                        </li>
                        <li class="flex items-center py-3">
                            <span>Joined</span>
                            <span class="ml-auto">{{ $user->created_at->diffForHumans() }}</span>
                        </li>
                         <li class="flex items-center py-3" x-show="opened" x-cloak>
                            <span>email</span>
                            <span class="ml-auto">
                                 
                                <a class="text-blue-800" href="mailTo:{{ isset($user->businessprofile->email) ? $user->businessprofile->email:$user->email }}"> {{ isset($user->businessprofile->email) ? $user->businessprofile->email:$user->email }}</a>
                                

                            </span>
                        </li>
                         <li class="flex items-center py-3" x-show="opened" x-cloak>
                            <span>contact</span>
                            <span class="ml-auto">
                               <a href="tel:{{ "0".$user->businessprofile->contact_number }}">{{ "+233 ".$user->businessprofile->contact_number }}</a>
                            
                            </span>
                        </li>
                        <li class="flex items-center py-3" x-show="opened" x-cloak>
                            <span>address</span>
                            <span class="ml-auto">
                             <address>   {{ $user->businessprofile->address }}
                            </address>
                            </span>
                        </li>

                        <li class="flex items-center py-3" x-show="opened" x-cloak>
                            <span>category</span>
                            <span class="ml-auto">
                             <span>   {{ $category }}
                             </span>
                            </span>
                        </li>

                         <li class="flex items-center py-3" x-show="opened" x-cloak>
                            <span>location</span>
                            <span class="ml-auto">
                             <span>   {{ $location }}
                             </span>
                            </span>
                        </li>
                        
                    </ul>
                     
                   </div>

                   <button x-show="opened" @click="opened = false" x-cloak
                        class="block w-full transform -translate-y-8 text-orange-800 text-sm font-semibold rounded-lg bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-orange focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        <span>Show Less Information</span></button>

                      <button x-show="!opened" @click="opened = true" x-cloak
                        class=" transform -translate-y-8 block w-full text-orange-800 text-sm font-semibold rounded-lg bg-gray-100 hover:bg-gray-200 focus:outline-none focus:shadow-outline-orange focus:bg-gray-100 hover:shadow-xs p-3 my-4">
                        <span >Show Full Information</span> </button>  
                </div>
                
            </div>
            
            <div class="w-full lg:w-8/12 bg-white min-h-screen rounded-t-md">
                    <div class="flex items-center justify-evenly min-h-10 h-14 bg-orange-300 rounded-t-md"> 
                        <span class="text-gray-500  px-2 text-xs md:text-sm py-1.5   ">
                     
                            {{ __(ucwords($user->name).'\'s') }} <span class="bg-gray-300 px-1 rounded-md font-semibold font-mono  ">Ads</span> </span>
                        <nav class="flex items-center bg-orange-200 p-0.5 py-1 rounded-md pl-2  "><span class="text-gray-500 text-xs md:text-sm">Filter</span> <x-selectoption class="mx-1 md:mx-2 text-orange-400 h-1/2 " options="order" :modelobjs="sortBy()"/></nav>
                        
                    </div>
                    
         <div class=" px-2 text-black grid grid-flow-row grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-4 mt-5 ">
       
            @foreach ($ads as $ad )
                
            @php
               
            $year = $ad->updated_at->format('Y');
            $month = $ad->updated_at->format('F');

        @endphp

            <x-searchcard :ad="$ad" class="  " >
            
            <img class="w-full h-32 " id="imgtag" onerror="errorhandler()"  src="{{  asset('storage/images/ads/'.$year.'/'.$month.'/'.$ad->image_one) }}" >
            <img class="w-full h-32" src="{{  asset('storage/images/ads/'.$year.'/'.$month.'/'.$ad->image_two) }}"  @mouseover="isFlyOpened=true" @mouseleave="isFlyOpened = false" >
                
        
        </x-searchcard>



            @endforeach
     
      
       
                        
                        </div>


            <div class="text-black flex items-center justify-items-center justify-center  my-8 w-full ">
                        <button class="bg-orange-400 text-white rounded-full px-4 py-2"> click to add </button>

            </div>
            
            
            </div>
            
        </div>
    </div>
</div>


@endsection