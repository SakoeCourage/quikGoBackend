{{-- {{ dd($options) }} --}}

<div {{ $attributes->merge(['class' => 'w-auto z-10 ']) }} x-data="select()">
    <div class="relative w-full" @click.away="closeListbox()" @keydown.escape="closeListbox()">


        <span class="inline-block rounded-md shadow-sm w-full">

            <button @click="toggleListboxVisibility()"
                class=" text-xs md:text-sm lg:text-sm  relative w-full mr-8  pl-3 text-left transition duration-150 ease-in-out bg-white  rounded-lg cursor-pointer
                     focus:outline-none focus:shadow-outline-orange focus:border-orange-300   md:py-1 md:leading-5 ">

                <span class="block truncate">
                    {{ isset(request()->$options) ? request()->$options : $options }}
                </span>

                <span class="absolute inset-y-0 right-0 flex items-center pr-2  pointer-events-none ">

                    <svg xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 text-gray-400 border-0 outline-none rounded-full" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor">
                        <path d="M7 10l5 5 5-5H7z" />
                    </svg>
                </span>
            </button>
        </span>

    </div>

    <div x-cloak x-show="open" x-transition:enter="transition ease-out duration  duration-200"
        x-transition:enter-start="opacity-0 transform translate-y-8"
        x-transition:enter-end="opacity-75 transform -translate-y-0"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-75 transform -translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-8"
        class="absolute inset-x-5 w-auto mt-2 bg-white rounded-md shadow-lg z-20 md:inset-auto ">
        <ul
            class="hidescroll w-full py-1 overflow-auto  text-base leading-6 rounded-md shadow-xs max-h-60 focus:outline-none   sm:text-sm sm:leading-5
    ">
            @foreach ($modelobjs as $modelobj)
                <li
                    class="w-full relative pl-3 text-gray-900 cursor-default select-none pr-9 hover:bg-orange-300  hover:text-white">
                    <span class="block font-normal truncate w-full">
                        @php
                            
                            $urlpath = request()->fullUrlWithQuery([$options => $modelobj->$options]);
                            $items = $modelobj->$options;
                            
                            echo "<a  class= ' text-xs md:text-sm lg:text-sm w-full h-full inline-block py-2  mr-4 '  href=$urlpath > $items  </a>";
                        @endphp


                    </span>
                    @if (request()->$options == $modelobj->$options)
                        <span class="ml-8  absolute inset-y-0 right-0 flex items-center pr-4 text-orange-300">
                            <svg class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                    @else

                    @endif

                </li>




            @endforeach

        </ul>
    </div>
</div>
