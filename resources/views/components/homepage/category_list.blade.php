
              @props(['accent', 'icon','type'])
          
          <div class=" inline-block bg-center m-1 border-white border-2  bg-yellow-700/90   rounded-full shadow-xl outline-none shadow-red-400/50 ">
              
            
               
    
                <div class="relative isolate rounded-full">
                  <span class="z-10 my-0 md:my-1 pl-9 md:pl-10 font-semibold text-center inline-block py-1 px-2 mr-2 text-sm  md:text-lg  text-white "><a class="inline-block w-full h-full underline decoration-{{ $accent }}-300" href="">{{ $type }}</a></span>
                  <i class=" blur-[1px] {{ $icon }} text-2xl  md:text-3xl absolute left-5 top-[1px]  md:top-2 text-{{ $accent }}-300 -z-10 "></i>
                </div>
              
            </div>
    
        
