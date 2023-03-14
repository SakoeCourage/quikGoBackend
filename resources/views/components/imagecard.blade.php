<div {{$attributes->merge(['class' =>'inline-block mx-8'])  }} x-data="getImageProps()" 
				>
				
				<div class="flex flex-col  py-2  object-scale-down ">
			    <div  class="w-44 h-44  self-center flex-none rounded-xl  overflow-hidden " :class="fileisvalid?'':'border-2 border-red-500'">
				<img  class="w-full h-full object-scale-down" src="{{ asset('images/uploads.svg') }}" alt="Avatar Upload" id="{{ $name }}" >
                
                     </div>
				<label class="cursor-pointer flex flex-col max-w-xs ">
                <span  x-text="filename" class=" self-center text-xs md:text-sm truncate w-full text-center mx-2  text-gray-600  " :class="fileisvalid?'':'underline text-red-500'">file name</span>
                <span class="focus:outline-none text-center text-white text-sm  px-4 rounded-full bg-gray-400 hover:bg-gray-500 hover:shadow-lg">choose</span>
                <input  x-on:change="getimage($event,'{{ $name }}'),
						$event.target.dispatchEvent(new CustomEvent(valid_image = fileisvalid)) "
					 type="file" class="hidden "  accept="image/*" name="{{ $name }}" 
					
				>

                </label>

							</div>

						 </div>