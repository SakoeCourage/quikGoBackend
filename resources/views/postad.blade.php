@extends('layout')


@section('content')

    <main class="sm:container sm:mx-auto sm:mt-5  grid place-items-center relative">
        <div class="border-blue border-2  w-full p-5 pt-16 md:p-10 md:pt-24 bg-white md:rounded-xl shadow-lg ">
            <div
                class=" px-4 md:px-8 flex justify-items-center items-center bg-orange-300 absolute top-0.5 inset-x-0.5 md:rounded-t-xl  h-16 md:h-24 ">
                <h2 class="font-semibold md:text-lg mr-5 text-sm text-gray-200 ">Post faster</h2>
                <a class="bg-gray-200 text-orange-400 inline-block rounded-full px-4 text-sm md:text-lg " href="">Add a basic
                    business profile <i class=" font-thin text-orange-200  fas fa-forward"></i></a>

            </div>
            <div class="grid  gap-8 grid-cols-1">
                <div class="flex flex-col ">

                    <div class="mt-5">
                        <form class="form " action="/ads/postad" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class=" overflow-scroll hidescroll md:space-y-2 mb-3 border-b-2 border-t-2 border-gray-100 "
                                x-data="{valid_image:true}">
                                <label class="text-xs font-semibold  text-gray-600 py-2">image <span
                                        class="text-red-400">(atleast first two images are required)*</span></label>
                                <h1 class="text-red-500 text-sm" x-show='!valid_image'>image format is not supported,
                                    accepted: <abbr>TIFF,JPEG,PNG</abbr></h1>
                                @error('first_image')
                                    <h1 class="text-red-500 text-sm">First two images are required <abbr>TIFF,JPEG,PNG</abbr>
                                    </h1>
                                @enderror
                                @error('third_image')
                                    <p class="text-red-500 text-xs block">{{ $message }}</p>
                                @enderror

                                @error('fourth_image')
                                    <p class="text-red-500 text-xs block">{{ $message }}</p>
                                @enderror

                                <div class="flex  overflow-scroll hidescroll">
                                    <x-imagecard name="first_image"></x-imagecard>
                                    <x-imagecard name="second_image"></x-imagecard>
                                    <x-imagecard name="third_image"></x-imagecard>
                                    <x-imagecard name="fourth_image"></x-imagecard>


                                </div>

                                @error('second_image')
                                    <h1 class="text-red-500 text-sm">First two images are required <abbr>TIFF,JPEG,PNG</abbr>
                                    </h1>
                                @enderror

                            </div>
                            <div class="md:flex md:flex-row  w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Item name <abbr title="required"
                                            class=" text-red-500">*</abbr></label>
                                    <input value="{{ old('item_name') }}" placeholder="name of the item" name="item_name"
                                        class=" focus:border-transparent block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 focus:outline-none focus:shadow-outline-orange"
                                        type="text">
                                    @error('item_name')
                                        <p class="text-red-500 text-xs ">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                      
                            <div class="flex-auto  w-full mb-4 text-xs space-y-2">
                                <label class="font-semibold text-gray-600 py-2">Item Description/Specification</label>
                                <input id="x" type="hidden" name="description" value="{{ old('description') }}">
                                <trix-editor input="x"></trix-editor>
                            </div>

                            <div class=" inline-flex mb-4">
                                <label class="font-semibold text-xs text-gray-600 py-2 inline leading-6 w-20 ">Price
                                    GH&#8373</label>
                                <input value="{{ old('price') }}" placeholder="0000" name="price"
                                    class=" focus:border-transparent inline w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 focus:outline-none focus:shadow-outline-orange text-xs"><abbr
                                    title="required" class=" text-red-500 ml-2">*</abbr>

                            </div>
                            @error('price')
                                <p class="text-red-500 text-xs block">{{ $message }}</p>
                            @enderror

                            <div class="md:flex md:flex-row md:space-x-4 w-full text-xs">
                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Contact number <abbr title="required"
                                            class=" text-red-500">*</abbr></label>
                                    <input value="{{ old('contact_number') }}" placeholder="(000) 000-0000"
                                        name="contact_number"
                                        class=" focus:border-transparent block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 focus:outline-none focus:shadow-outline-orange"
                                        type="tel" name="integration[street_address]" id="integration_street_address">
                                    @error('contact_number')
                                        <p class="text-red-500 text-xs ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Location<abbr title="required"
                                            class=" text-red-500">*</abbr></label>
                                    <select name="location"
                                        class=" focus:border-transparent block w-full bg-grey-lighter text-gray-500 border border-grey-lighter rounded-lg h-10 px-4 md:w-full focus:outline-none focus:shadow-outline-orange "
                                        name="integration[city_id]" id="integration_city_id">
                                        <option disabled="" value="">Select category</option>
                                        @foreach (App\Models\Location::all() as $location)
                                            <option class="text-grey-darker" value="{{ $location->id }}">
                                                {{ $location->location }}</option>

                                        @endforeach



                                    </select>
                                    @error('location')
                                        <p class="text-red-500 text-xs ">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="w-full flex flex-col mb-3">
                                    <label class="font-semibold text-gray-600 py-2">Category<abbr title="required"
                                            class=" text-red-500">*</abbr></label>
                                    <select name="category"
                                        class="focus:border-transparent  block w-full text-gray-500  text-grey-darker border border-grey-lighter rounded-lg h-10 px-4 md:w-full focus:outline-none focus:shadow-outline-orange"
                                        name="integration[city_id]" id="integration_city_id">
                                        <option value="">Select category</option>
                                        @foreach (App\Models\Category::all() as $category)
                                            <option value="{{ $category->id }}">{{ $category->category }}</option>

                                        @endforeach



                                    </select>
                                    @error('category')
                                        <p class="text-red-500 text-xs ">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                    </div>
                    <div class="flex-auto w-full  text-xs space-y-2 mb-8">
                        <label class="font-semibold text-gray-600 py-2">State Others if chossen</label>
                        <textarea value="{{ old('others') }}" name="others" id=""
                            class="focus:border-transparent min-h-[100px] max-h-[300px] h-20 appearance-none block w-full bg-gray-lighter text-grey-darker border border-grey-lighter rounded-lg  py-4 px-4 focus:outline-none focus:shadow-outline-orange"
                            placeholder="State other category" spellcheck="false"></textarea>
                        @error('others')
                            <p class="text-red-500 text-xs ">This field is required</p>
                        @enderror
                    </div>

                </div>
                <p class="text-xs text-red-500 text-right my-3">Required fields are marked with an
                    asterisk <abbr title="Required field">*</abbr></p>
                <div class="mt-5 text-right md:space-x-3 md:block flex flex-col">
                    <button type="submit"
                        class="mb-2 md:mb-0 bg-orange-400 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-orange-500 focus:outline-none  focus:shadow-outline-orange">Post
                        Ad</button>
                    <button
                        class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100 focus:outline-none focus:shadow-outline-orange ">
                        Cancel </button>

                </div>
                </form>
            </div>
        </div>
        </div>


    </main>
@endsection
