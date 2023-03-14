@extends('layout')


@section('content')

<div class="container w-full mx-auto ">

 <div class=" grid grid-cols-1 lg:flex w-full mt-0 md:mt-2 ">
    <div class=" lg:w-8/12  bg-white shadow-inner grid grid-cols-1 p-4" x-data="{image: 'image1' }

    " >
        <div class="w-full grid place-items-center">
                @php
                $year = $ad->updated_at->format('Y');
                $month = $ad->updated_at->format('F');
                $items = array('image_one', 'image_two','image_three','image_four');
           
                @endphp

                @for ( $x =0; $x < sizeof($items); $x++)
                
                
                @isset($ad->{$items[$x]} )
                <img src="{{ asset('storage/images/ads/'.$year.'/'.$month.'/'.$ad->{$items[$x]}) }}" alt="" class=" h-96 w-auto" x-cloak x-show="image=== 'image{{$x+1}}'"> 
                @endisset
                
                   
                @endfor
           
          

        </div>
        <div class="grid place-items-center mt-5 overflow-hidden"> 

         <div class="flex  h-16 md:h-24 p-1  "> 
            @for ( $x =0; $x < sizeof($items); $x++)
          
            
            @isset($ad->{$items[$x]} )
  
            <img class="mx-2  md:w-32 w-16 cursor-pointer hidescroll overflow-x-scroll md:overflow-x-hidden "  :class ="{'shadow-outline-orange' : image==='image{{$x+1}}'}" @click="image='image{{$x+1}}'" src="{{ asset('storage/images/ads/'.$year.'/'.$month.'/'.$ad->{$items[$x]}) }}" alt="">
            @endisset
            
               
            @endfor
           
        </div>
        </div>
        

    </div>
   



    <div class="h-full lg:w-4/12 border-2 border-orange-100 bg-white p-4  ml-2   "> 
                <div class="flex justify-between font-semibold ">
                <span class=" w-10/12 ">{{ strtoupper($ad->item_name) }}</span> 
                <span class=" w-4/12 bg-orange-200 rounded-full px-1 grid place-items-center text-orange-700 text-xs h-6">{{ $ad->created_at->diffForHumans() }}</span></div>
                    <hr class="mt-2">
                <div class="my-2 flex ">
                    
                    <span class=" "><i class=" inline text-xs  fas fa-user mx-1 text-yellow-600 mb-0.5 opacity-75 mr-4"></i></span>{{ $ad->user()->first()->name }}</div>
                <div class="my-2"><span><i class=" inline fas fa-map-marker-alt text-yellow-600 mx-1 mb-0.5 opacity-75 mr-4"></i>{{ $location }}</span></div>
                <div class="my-2"><i class="inline fas fa-layer-group text-yellow-600 mx-1 mb-0.5 opacity-75 mr-4"></i>{{$category }}</div>
                <div class="my-2">
                    <i class=" inline text-xs  fas fa-phone mx-1 text-yellow-600 mb-0.5 opacity-75 transform rotate-90 mr-4"></i>
                    <a href="tel: 0{{ $ad->contact_number }}"> 0{{ $ad->contact_number }}</a>
                

                </div>

                <div class="pl-2 my-2"><span class="text-yellow-600 opacity-75 text-xl transform scale-150 font-bold mr-4">&#8373</span> <span class=" font-semibold">{{ $ad->price }}</span></div>
           
                @isset($ad->description)
                <div class="w-full border-2 border-gray-200 p-3 trix-editor mt-5  ">
                    {!! $ad->description !!}
                </div>
         
                           
                       </div> 
                @endisset



 </div>
 

</div>
<div class="border-2 border-gray-400 w-full h-60 mt-4 ">

    this is for comment section
 </div>

















@endsection