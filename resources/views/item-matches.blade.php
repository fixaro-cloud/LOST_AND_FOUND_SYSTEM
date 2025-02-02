@props(['matchedFoundItems','lostItem'])

<x-app-layout>
    <div class=" min-h-screen max-w-screen-xl mx-auto px-4 py-4 md:py-7 ">
        <div class=" grid grid-cols-1 md:grid-cols-3 gap-3 mb-3 md:mb-6">
            <div class=" col-span-3 text-center text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r to-cyan-900 from-sky-400 font-mono mb-2 ">Matched Items for {{ $lostItem->item_name }}</div>
            @foreach ($matchedFoundItems as $foundItem)

            <div class="w-full max-w-md bg-gray-600 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class=" ">
                    <img src="{{ $foundItem->photo }}" alt="" class=" w-full h-48 object-cover ">
                </div>
                <div class=" p-2 sm:p-4 md:p-6">
                    <div class="flex items-center justify-between mb-4 md:mb-6">
                        <h5 class="text-md font-bold leading-none text-gray-100">{{ $foundItem->user->name }}</h5>
                        <h5 class=" text-sm font-semibold leading-none text-gray-100 ">reported at- {{ $foundItem->created_at->format('d-m-Y')}}</h5>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-md mb-2 
                          text-gray-100">Item name - {{ $foundItem->item_name }}</p>
                        <p class="text-md mb-2 
                         text-gray-100">Category - {{ $foundItem->category->category_name }}</p>
                        <p class="text-md mb-2
                         text-gray-100">Location Found - {{ $foundItem->location->location_name }}</p>
                        
                            <p class="text-md mb-4
                         text-gray-100">
                            Date Found - {{ $foundItem->date_found->format('d-m-Y') }}
                            </p>   
                            <form action="/dashboard/{{ $lostItem->id }}/matches/{{ $foundItem->id }}/verify" method="get">
                             @csrf
                                <div class=" flex justify-start ">
                                    <button type="submit" class="py-1.5 px-4 me-2 text-md w-full font-semibold text-gray-900 focus:outline-none bg-slate-300 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Claim Item</button>
                                </div> 
                            </form>
                          
                           
                    </div>
                </div>
              
            </div>
            @endforeach
           
        </div>
        
        
    </div>

</x-app-layout>