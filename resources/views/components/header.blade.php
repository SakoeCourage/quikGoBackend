<!-- component -->

<div class=" h-10 md:h-14  ">
<nav class="bg-white shadow  relative h-full   " x-data="Disablescroll()" >
  
  <div class=" mx-auto px-6   h-full md:flex md:justify-between md:items-center  "  >
    <div class="flex justify-between items-center h-full ">
      <div>
        <a class="text-gray-800 text-xl font-bold md:text-2xl hover:text-gray-700" href="/">Logo</a>
        
          <div>
          
      </div>
      </div>

     
      <div class="flex md:hidden">
        
         <button  type="button"  class="text-gray-500 w-10 h-10 relative focus:outline-none " @click="openSidebar()">
                
                <div class="block w-5 absolute left-1/2 top-1/2   transform  -translate-x-1/2 -translate-y-1/2">
                    <span aria-hidden="true" class="block absolute h-0.5 w-5 bg-gray-500 transform transition duration-500 ease-in-out" :class="{'rotate-45': showdrop,' -translate-y-1.5': !showdrop }"></span>
                    <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-gray-500 transform transition duration-500 ease-in-out" :class="{'opacity-0': showdrop } "></span>
                    <span aria-hidden="true" class="block absolute  h-0.5 w-5 bg-gray-500 transform  transition duration-500 ease-in-out" :class="{'-rotate-45': showdrop, ' translate-y-1.5': !showdrop}"></span>
                </div>
            </button>
      </div>
    </div>

  
    
      <div x-cloak x-data="{show:false }"  x-ref="sidebar" id="sidebar"
     
        
      
      class="md:relative  z-20  md:left-0 inset-x-0 bg-orange-400 md:bg-white  flex flex-col  h-screen md:h-full justify-center items-center md:py-1   leading-8 md:leading-normal  md:flex md:flex-row md:mx-6   absolute    overflow-hidden md:overflow-visible" :class="showdrop ? 'left-0 ':'   left-full'">
        
        <a class=" w-full text-center md:w-auto  my-2 text-lg  md:text-sm  text-gray-200 hover:bg-gray-200  md:text-gray-700  px-2 rounded  font-medium hover:text-yellow-500 md:mx-4 md:my-0" href="/">Home</a>
        <a class=" w-full text-center md:w-auto md:text  my-2 text-lg  md:text-sm text-gray-200 md:text-gray-700 hover:bg-gray-200 px-2 rounded hover:text-yellow-500  font-medium  md:mx-4 md:my-0" href="/ads">Browse Ads</a>
        <a class=" w-full text-center md:w-auto    my-2 text-lg  md:text-sm text-gray-200 md:text-gray-700 hover:bg-gray-200 px-2 rounded font-medium hover:text-yellow-500 md:mx-4 md:my-0" href="/ads/postad">Post Ads</a>
        <nav class=" ">
                    @guest
                        <a class="  grid place-items-center md:text-yellow-500 text-yellow-100 p-2 h-full text-lg md:text-sm rounded-full focus:outline-none  " href="{{ route('login') }}">{{ __('Login') }}</a>
                       
                    @else
                        

                      
                    @endguest
          </nav>
                  @auth
             @if (isset(Auth::user()->businessprofile->profile_image))
          <nav class="relative " > <button @click="show= !show" 
               
              class="flex mx-2 px-4 items-center rounded-full bg-gray-200 py-2 focus:outline-none focus:shadow-outline-orange md:relative   ">
            
            
            <h1 class="truncate text-orange-400 "> {{ Auth::user()->name }}</h1>
            <img class="h-6 w-6 mx-2 rounded-full  shadow-outline-orange " src=" {{ asset('profileimages/'.Auth::user()->businessprofile->profile_image) }}" alt="">
            </button>
                        
             <div @click.away="show=false" x-cloak x-show="show"
                        x-transition:enter= "transition ease-out duration  duration-200"
                        x-transition:enter-start="opacity-0 transform translate-y-8"
                        x-transition:enter-end="opacity-75 transform -translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-75 transform -translate-y-0"
                        x-transition:leave-end="opacity-0 transform translate-y-8"
                    class=" z-40 absolute mt-4  w-full   rounded-md mx-auto bg-white  shadow-outline-orange" >
                  <ul class="mx-4 boder-2  ">
                  <li class="my-2 w-full hover:bg-gray-200 hover:text-yellow-500 rounded-md"><a href="/{{ Auth::user()->name }}/profile" class=" w-full inline-block  pl-2">my profile</a></li>  
                  <li class="my-2 w-full hover:bg-gray-200 hover:text-yellow-500 rounded-md "><a href="" class=" w-full inline-block  pl-2" >settings</a></li>  
                  <hr>
                  <li class="my-2 w-full hover:bg-gray-200 hover:text-orange-700 rounded-md"> 
                      <a href="{{ route('logout') }}"
                           class="w-full inline-block pl-2 "
                           onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            {{ csrf_field() }}
                        </form>  
                  
                  
                 </li>  
                  </ul>  
                </div> 
        
            
              </nav>
                  @endauth


         
       @endif
     
                <button class=" absolute bottom-20 rounded-full border-2  text-gray-100 md:hidden focus:border-white border-white hover:border-2 focus:outline-none " @click="closeSidebar()"><i class="fas fa-times mx-4"></i></button>
      </div>
    

    </div>
</nav>

          
        
      </div>
         
     
 
    




