@props(['foundItems','lostItems'])

<x-app-layout>
    <div class=" min-h-screen max-w-screen-xl mx-auto px-4 py-4 md:py-7 ">
        <div class="text-center text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r to-cyan-900 from-sky-400 font-mono mb-2 ">All Found Items</div>
        <div class=" grid grid-cols-1 md:grid-cols-3 gap-3 mb-3 md:mb-6">
            <div class="col-span-3 hidden last:block  text-center text-3xl font-bold  "> 
                <div class="flex justify-center">
                    <div class=" w-3/5 flex items-center shadow-lg">
                        <div class=" w-80 pt-4">
                            <p class=" font-mono text-2xl ">Found Items have not been reported yet!</p>
                        </div>
                        <div class="">
                            <img src="/logo/not-found.png" alt="" class=" w-80">
                        </div>
                        
                    </div>
                  
                </div>
            </div>
            @foreach ($foundItems as $foundItem)

            <div class="w-full max-w-md  bg-gray-500 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class=" ">
                    <img src="{{ $foundItem->photo }}" alt="" class=" w-full h-48 object-cover ">
                </div>
                <div class=" p-2 sm:p-4 md:p-6">
                    <div class="flex items-center justify-between mb-4 md:mb-6">
                        <h5 class="text-md font-bold leading-none text-gray-100">{{ $foundItem->user->name }}</h5>
                        <h5 class=" text-sm font-semibold leading-none text-gray-100 ">reported at - {{ $foundItem->created_at->format('d-m-Y')}}</h5>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-md mb-2 
                          text-gray-100">Item name - {{ $foundItem->item_name }}</p>
                        <p class="text-md mb-2 
                         text-gray-100">Category - {{ $foundItem->category->category_name }}</p>
                        <p class="text-md mb-2
                         text-gray-100">Location Found - {{ $foundItem->location->location_name }}</p>
                        <p class="text-md mb-3
                         text-gray-100">
                            Date Found - {{ $foundItem->date_found->format('d-m-Y') }}
                        </p>                
                    </div>
                </div>
              
            </div>
            @endforeach     

        </div>
        <div class=" col-span-3 text-lg-center font-semibold flex justify-center">
            {{ $foundItems->links() }}
        </div>
        <div class="text-center text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r to-cyan-900 from-sky-400 font-mono mt-7 mb-2 ">All Lost Items</div>
        <div class=" grid grid-cols-1 md:grid-cols-3 gap-3 mb-4 md:mb-7">
            <div class="col-span-3 hidden last:block  text-center text-3xl font-bold  "> 
                <div class="flex justify-center">
                    <div class=" w-3/5 flex items-center shadow-lg">
                        <div class="">
                            <img src="/logo/not-found.png" alt="" class=" w-80">
                        </div>
                        <div class=" w-80 pt-4">
                            <p class=" font-mono text-2xl ">Lost Items have not been reported yet!</p>
                        </div>
                    </div>
                  
                </div>
            </div>
            @foreach ($lostItems as $lostItem)

            <div class="w-full max-w-md p-2 bg-gray-500 border border-gray-200 rounded-lg shadow sm:p-5 dark:bg-gray-800 dark:border-gray-700">
                <div class="flex items-center justify-between mb-4 md:mb-6">
                    <h5 class="text-md font-bold leading-none text-gray-100">{{ $lostItem->user->name}}</h5>
                    <h5 class=" text-sm font-semibold leading-none text-gray-100 ">{{ $lostItem->created_at->format('d-m-Y')}}</h5>
                </div>
                <div class="flex flex-col">
                    <p class="text-md mb-2 
                      text-gray-100">Item name - {{ $lostItem->item_name }}</p>
                    <p class="text-md mb-2 
                     text-gray-100">Category - {{ $lostItem->category->category_name }}</p>
                    <p class="text-md mb-2
                     text-gray-100">Location Lost - {{ $lostItem->location->location_name }}</p>
                    <p class="text-md mb-3
                     text-gray-100">
                        Date lost - {{ $lostItem->date_lost->format('d-m-Y') }}
                    </p>                
                </div>
            </div>
            @endforeach
        </div>

        <div class=" col-span-3 text-lg-center font-semibold flex justify-center">
            {{ $lostItems->links() }}
        </div>
       
        
    </div>
</x-app-layout>