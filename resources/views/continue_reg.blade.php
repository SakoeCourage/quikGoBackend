

@extends('layout')


@section('content')

<main class="sm:container sm:mx-auto sm:mt-5  grid place-items-center relative">
<div class="border-blue border-2  w-full p-5 pt-16 md:p-10 md:pt-24 bg-white md:rounded-xl shadow-lg ">
		<div class=" px-4 md:px-8 flex justify-items-center items-center bg-orange-300 absolute top-0.5 inset-x-0.5 md:rounded-t-xl  h-16 md:h-24 ">
				<h2 class="font-semibold md:text-lg mr-auto text-sm text-gray-200 ">Basic Business Profile</h2>
                <a class="bg-gray-200 text-orange-400 inline-block rounded-full px-4 text-sm md:text-lg " href="">Skip for now <i class=" font-thin text-orange-200  fas fa-forward"></i></a>
                
			</div>
<div class="grid  gap-8 grid-cols-1">
	<div class="flex flex-col ">
		
			<div class="mt-5">
				<form class="form " action="/businessprofile" method="POST" enctype="multipart/form-data">
                    @csrf
					<div x-data="getImageProps()"
	
					class=" overflow-hidden md:space-y-2 mb-3 border-b-2 border-t-2 border-gray-100">
						<label class="text-xs font-semibold  text-gray-600 py-2">Profile Logo</label>
                        <h1 class="text-red-500 text-sm" x-cloak x-show="!fileisvalid">image format is not supported, accepted: <abbr>TIFF,JPEG,PNG</abbr></h1>
                       

						<div class="flex items-center py-6">
			        <div class="w-10 h-10 mr-4 flex-none rounded-xl  overflow-hidden " :class="fileisvalid?'':'border-2 border-red-500'">
				<img class="w-full h-full  object-cover" src="{{ asset('images/avatar.svg') }}" alt="Avatar Upload" id="img_avatar">
                
                     </div>
					 
				<label class="cursor-pointer flex flex-wrap max-w-xs ">
                <span  x-text="filename" class="text-xs md:text-sm truncate max-w-1/3  mx-2  text-gray-600  " :class="fileisvalid?'':'underline text-red-500'">file name</span>
                <span class="focus:outline-none text-white text-sm  px-4 rounded-full bg-gray-400 hover:bg-gray-500 hover:shadow-lg">choose</span>
                <input  x-on:change="getimage($event, 'img_avatar')"  type="file" class="hidden " accept="image/*" name="profile_image" id="avatar_input">

                </label>

							</div>
                             @error('profile_image')
                        <h1 class="text-red-500 text-sm" >{{ $message }} <abbr>TIFF,JPEG,PNG</abbr></h1>
                        @enderror
						</div>
						<div class="md:flex flex-row md:space-x-4 w-full text-xs">
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class=" font-semibold text-gray-600 py-2">Business  Name <abbr title="required" class=" text-red-500">*</abbr></label>
								<input value="{{ old('business_name') }}" placeholder="business Name" name="business_name" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-gray-lighter rounded-lg h-10 px-4 focus:outline-none focus:shadow-outline-orange"  type="text" name="integration[shop_name]" id="integration_shop_name">
								@error('business_name')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>  
                                @enderror
							</div>
							<div class="mb-3 space-y-2 w-full text-xs">
								<label class="font-semibold text-gray-600 py-2">email </label>
								<input value="{{ old('business_email') }}" placeholder="{{ Auth::user()->email }}" name="business_email" class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 focus:outline-none focus:shadow-outline-orange"  type="text" name="integration[shop_name]" id="integration_shop_name">
								@error('business_email')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>  
                                @enderror
							</div>
						</div>
						<div class="mb-3 space-y-2 w-full text-xs">
							<label class=" font-semibold text-gray-600 py-2">Business  address</label>
							<div class="block w-full mb-4 relative">
							
								<input value="{{ old('business_address') }}" type="text" name="business_address" class="  w-full leading-normal border  h-10 border-grey-light rounded-lg rounded-l-none px-3 relative focus:border-blue  focus:outline-none focus:shadow-outline-orange" placeholder="business address..">
                                @error('business_address')
                                <p class="text-red-500 text-xs block ">{{ $message }}</p>  
                                @enderror
                            </div>
							</div>
							<div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
								<div class="w-full flex flex-col mb-3">
									<label class="font-semibold text-gray-600 py-2">Contact number <abbr title="required" class=" text-red-500">*</abbr></label>
									<input value="{{ old('contact_number') }}" placeholder="(000) 000-0000" name="contact_number" class=" block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 focus:outline-none focus:shadow-outline-orange" type="tel" name="integration[street_address]" id="integration_street_address">
                                    @error('contact_number')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>  
                                @enderror
                                </div>
                                    
							<div class="w-full flex flex-col mb-3">
										<label class="font-semibold text-gray-600 py-2">Location<abbr title="required" class=" text-red-500">*</abbr></label>
										<select name="location" class="  block w-full bg-grey-lighter text-gray-500 border border-grey-lighter rounded-lg h-10 px-4 md:w-full focus:outline-none focus:shadow-outline-orange "  name="integration[city_id]" id="integration_city_id" >
                                            <option value="">Select category</option>     
                                            @foreach ( App\Models\Location::all() as $location )
                                                    <option class="text-grey-darker" value="{{ $location->id }}">{{ $location->location }}</option>
                                                    
                                                    @endforeach       
                                            
                                                  
                                               
                                </select>
                                @error('location')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>  
                                @enderror
									</div>
              
                                <div class="w-full flex flex-col mb-3">
										<label class="font-semibold text-gray-600 py-2">Category of business<abbr title="required" class=" text-red-500">*</abbr></label>
										<select name="category" class="  block w-full text-gray-500  text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full focus:outline-none focus:shadow-outline-orange"  name="integration[city_id]" id="integration_city_id">
                                                    <option value="">Select category</option>    
                                            @foreach ( App\Models\Category::all() as $category )
                                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                                    
                                                    @endforeach       
                                            
                                                  
                                               
                                </select>
                                @error('category')
                                <p class="text-red-500 text-xs ">{{ $message }}</p>  
                                @enderror
									</div>
              
									</div>

								</div>
								<div class="flex-auto w-full mb-1 text-xs space-y-2">
									<label class="font-semibold text-gray-600 py-2">State Others if chossen</label>
									<textarea value="{{ old('others') }}"  name="others" id="" class=" min-h-[100px] max-h-[300px] h-20 appearance-none block w-full bg-gray-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4 focus:outline-none focus:shadow-outline-orange" placeholder="State other cateogory" spellcheck="false"></textarea>
                                    @error('others')
                                    <p class="text-red-500 text-xs ">This field is required</p>  
                                    @enderror
                                        </div>
                  
								</div>
								<p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
									asterisk <abbr title="Required field">*</abbr></p>
								<div class="mt-5 text-right md:space-x-3 md:block flex flex-col">
                                    <button type="submit" class="mb-2 md:mb-0 bg-orange-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-orange-500 focus:outline-none  focus:shadow-outline-orange">Save</button>
									<button class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline-orange "> Cancel </button>
									
								</div>
							</form>
						</div>
					</div>
				</div>
		
</main>
@endsection
