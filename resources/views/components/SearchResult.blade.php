@include('components.filtercomponents')



<div class=" pt-3  relative">

    <div
        class="shadow-lg flex flex-col  md:h-auto md:flex-col lg:flex-row justify-between px-1 md:px-4 sticky top-0 z-10 bg-white py-1">

        <x-minisearch></x-minisearch>

        <div
            class=" bg-gray-50 text-xs flex flex-row items-center w-full h-9  px-2 rounded-md border-2 border-gray-300 overflow-scroll hidescroll md:overflow-auto lg:h-auto md:h-10   lg:w-1/2 md:justify-center md:py-1 md:text-base ">
            <nav class="flex  md:items-center">


                <h4 class="border-3 border-r border-gray-300 pr-2 ">Filter</h4>
            </nav>
            <x-selectoption class="mx-1  md:mx-2 " options="category"
                :modelobjs="App\Models\Category::All(['category'])" />
            <x-selectoption class="mx-1 md:mx-2" options="location"
                :modelobjs="App\Models\Location::All(['location'])" />
            <x-selectoption class="mx-1 md:mx-2" options="price" :modelobjs="Price()" />
            <x-selectoption class="mx-1 md:mx-2" options="order" :modelobjs="sortBy()" />


        </div>

    </div>

    <div
        class=" grid grid-cols-1 gap-y-2 md:gap-y-1 lg:grid-cols-2  lg:gap-3 w-full pt-1 md:pt-3 px-0 md:px-8 bg-gray-200  ">




        @if ($ads->count() > 0)

            @foreach ($ads as $ad)
                <x-searchcard :ad="$ad">


                    @php
                        
                        $year = $ad->updated_at->format('Y');
                        $month = $ad->updated_at->format('F');
                        
                    @endphp
                    {{-- {{ dd($month) }} --}}
                    <img class="w-full h-44 md:h-56 lg:h-56 " id="imgtag" onerror="errorhandler()"
                        src="{{ asset('storage/images/ads/' . $year . '/' . $month . '/' . $ad->image_one) }}">
                    <img class="w-full h-44 md:h-56 lg:h-56"
                        src="{{ asset('storage/images/ads/' . $year . '/' . $month . '/' . $ad->image_two) }}"
                        @mouseover="isFlyOpened=true" @mouseleave="isFlyOpened = false">


                </x-searchcard>
            @endforeach

        @endif



    </div>



</div>
