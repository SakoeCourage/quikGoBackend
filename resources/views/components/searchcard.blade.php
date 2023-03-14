<div {{ $attributes->merge(['class' => 'w-full   gap-5 overflow-hidden  shadow-xl ']) }}>
    {{-- {{ dd($ad->image_three) }} --}}

    <div class="w-full flex flex-col bg-white">
        <div class="w-full  grid grid-cols-2 h-8/12   p-1 relative gap-1 overflow-hidden" x-data="{isFlyOpened:false}">
            {{ $slot }}


            @isset($ad->image_three, $ad->image_four)


                <div x-cloak
                    class=" w-1/2 h-1/3  opacity-75 text-center text-white absolute bottom-0 right-0 flex flex-row items-end justify-center rounded-t-lg bg-gradient-to-b from-transparent to-black"
                    x-show="isFlyOpened" x-transition:enter="transition ease-out duration  duration-300"
                    x-transition:enter-start="opacity-0 transform translate-y-8"
                    x-transition:enter-end="opacity-75 transform -translate-y-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="opacity-75 transform -translate-y-0"
                    x-transition:leave-end="opacity-0 transform translate-y-8" @mouseover="isFlyOpened=true"
                    @mouseleave="isFlyOpened = false">
                    <a href="/ads/{{ $ad->slug }}"
                        class="  bg-yellow-600 text-white text-sm mb-6 rounded-lg px-2 py-1 font-thin ring-4 ring-yellow-500"
                        @mouseover="isFlyOpened=true" @mouseleave="isFlyOpened = false">view all</a>
                </div>
            @endisset

        </div>
        <div class="w-full h-4/12 border-white border-4 border-t-0 shadow-md   flex flex-col p-2 ">
            <div class="flex items-center justify-between">
                <a href="/ads/{{ $ad->slug }}"
                    class=" text-sm font-semibold  text-center  w-full    truncate text-yellow-900     ">
                    {{ strtoupper($ad->item_name) }} </a>
                <h1
                    class=" bg-orange-200 py-1 text-xs md:text-sm flex flex-row justify-center items-center text-yellow-900 rounded-lg shadow-lg  px-2 w-2/5 ">
                    GH&#8373 {{ $ad->price }}</h1>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-2 md:grid-cols-2 gap-y-2  py-2">
                {{-- <span class=" py-1 truncate text-xs   md:text-sm flex flex-row justify-center items-center text-yellow-600 rounded-lg shadow-lg "><i class=" hidden md:inline  fas fa-user mx-2"></i><h4> user info</h4></span> --}}
                <span
                    class=" py-1 truncate text-xs md:text-sm flex flex-row justify-center items-center text-center text-yellow-600 mx-2 rounded-lg shadow-lg"><i
                        class=" inline fas fa-map-marker-alt mx-2"></i>
                    <h4>{{ App\Models\Location::find($ad->location_id)->location }}</h4>
                </span>
                {{-- <span class=" py-1 truncate text-xs md:text-sm flex flex-row justify-center items-center text-center text-yellow-600 mx-2 rounded-lg shadow-lg"><i class="hidden md:inline fas fa-layer-group mx-2"></i> <h4>category</h4></span> --}}
                <span
                    class=" py-1 truncate text-xs md:text-sm flex flex-row justify-center items-center text-center text-yellow-600  rounded-lg shadow-lg ">
                    <i class=" inline fas fa-clock mx-2"></i>
                    <h4>{{ $ad->created_at->diffForHumans() }}</h4>
                </span>

            </div>

        </div>

    </div>
</div>
