@extends('layout')


@section('content')

<x-homepage.searchhero></x-homepage.searchhero>

<div  class="bg-gray-100">



  <main class="w-full">
      <div class="container mx-auto bg-gray-100">

  <div class="mt-8">
           <div class=" container mx-auto px-6 flex justify-between items-center  ">
             <h3 class="text-gray-400  text-sm lg:text-xl font-medium">Lucky row</h3>  
             <button class=" focus:outline-none flex items-center justify-between rounded-full text-xs bg-orange-100 text-orange-500 px-4  ">
               <a  href="/ads" class=" text-sm  md:text-lg mr-2 h-full ">view more</a> <i  class="fas  fa-arrow-right  text-orange-500"></i>
                      </button></div>


         
  <div class="flex flex-col bg-white md:mx-6 lg:m-auto p-auto relative mx-4 " x-data="horizontalscroll()" >

        <div id="recentcontainer" @scroll="getscrolledamount()" class=" flex overflow-x-scroll py-5 hidescroll scroll-snap-x"   >
          <button @click="scrolltoLeft()" x-cloak x-show="scrolledleft" class="absolute top-[45%]  rounded-full h-6 w-6  md:h-12 md:w-12 bg-orange-300 ring-2 ring-white  -left-4 md:-left-6  grid place-items-center  focus:outline-none z-10">
              <i class="fas fa-chevron-left"></i>

          </button>
          <button  @click="scrolltoRight()" x-show="scrolledright" class=" absolute top-[45%] h-6 w-6  md:h-12 md:w-12 rounded-full   bg-orange-300 ring-2 ring-white -right-4 md:-right-6  grid place-items-center  focus:outline-none z-10">
              <i class="fas fa-chevron-right text-white"></i>
          </button>
          <div class="flex flex-nowrap w-full"   >
          
              
              
           @foreach ( $ads as $ad )
             
          
           @php
               
           $year = $ad->updated_at->format('Y');
           $month = $ad->updated_at->format('F');

       @endphp

           <div data-link="/ads/{{ $ad->slug }}" style="background-image: url('{{ asset('storage/images/ads/'.$year.'/'.$month.'/'.$ad->image_one) }}');  background-repeat:no-repeat; background-size: 100% 100%;" class="banner cursor-pointer scroll-snap-center min-w-[50%] aspect-[3/2] min-h-[140px] md:min-h-max block px-3 mx-2  rounded-lg shadow-md hover:shadow-xl scroll-card relative" >
              
                <div class="   p-2 absolute inset-x-0 bottom-0 bg-gradient-to-b from-transparent to-black py-[5%]   flex justify-end">
                  <div class=" shadow-2xl bg-gray-200 rounded-xl  p-1 md:p-2 flex max-w-full shadow-gray-300/20"> 
                    <a class=" hidden md:inline truncate mx-2   text-center" href="/ads/{{ $ad->slug }}">{{ $ad->item_name }}</a>
                    <h1 class=" hidden md:inline min-w-[20%] text-xs md:text-sm text-center  rounded-lg bg-orange-100 shadow-lg   p-1">GH&#8373 {{ $ad->price }}</h1>
                    <a href="/ads/{{ $ad->slug }}" class="md:hidden truncate text-xs md:text-sm text-center  rounded-lg bg-orange-100 shadow-lg   p-1">GH&#8373 {{ $ad->price }}</a>
                  </div>
                
              </div>
            </div>
            
            @endforeach
               
        
            
              </div>
        </div>
         </div>
  




      </div>
        
     </div>
 
  </main>

  <section class="py-8">
    <div class="container px-4 mx-auto">
      <span class="text-zinc-500  text-sm lg:text-xl font-medium pl-6 mb-2 inline-block"> Browse categories</span>
    <div class="">
        
      <x-homepage.category_list type="Fashion"  accent='fuchsia' icon='fas fa-tshirt'> </x-homepage.category_list>
      <x-homepage.category_list type="Automobile" accent='sky' icon='fas fa-bus-alt' > </x-homepage.category_list>
      <x-homepage.category_list type="Gadgets/computer"   accent='green' icon='fas fa-mobile-alt'> </x-homepage.category_list>
      <x-homepage.category_list type="Beauty"  accent='red' icon='far fa-grin-hearts'> </x-homepage.category_list>
      <x-homepage.category_list type="Self care/medicine" accent='lime' icon='fas fa-prescription-bottle-alt'> </x-homepage.category_list>
      <x-homepage.category_list type="animals/pets" accent='rose' icon='fas fa-dog'> </x-homepage.category_list>
      <x-homepage.category_list type="Sports" accent='sky' icon='fas fa-running'> </x-homepage.category_list>
      <x-homepage.category_list type="Software/Games" accent='blue' icon='fab fa-playstation'> </x-homepage.category_list>
      <x-homepage.category_list type="Agriculture" accent='green' icon='fas fa-seedling'> </x-homepage.category_list>
      <x-homepage.category_list type="education/books" accent='lime' icon='fas fa-book'> </x-homepage.category_list>
      <x-homepage.category_list type="Others" accent='emerald' icon='fas fa-tags'> </x-homepage.category_list>
    </div>
  

      </div>
    </section>

</div>
@endsection
