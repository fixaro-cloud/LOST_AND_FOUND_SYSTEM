@props(['lostItems','foundItems'])

<x-app-layout>

    @if (session()->has('lost-item-store-success'))
    <div class="p-4 mb-4 position-absolute text-lg text-center text-white bg-cyan-600 dark:bg-gray-200 dark:text-blue-400" role="alert">
        <span class=" font-medium  ">{{ session('lost-item-store-success') }}</span> 
      </div>
    @endif
    @if (session()->has('found-item-store-success'))
    <div class="p-4 mb-4 position-absolute text-lg text-center text-white bg-cyan-600  dark:bg-gray-200 dark:text-blue-400" role="alert">
        <span class=" font-medium  ">{{ session('found-item-store-success') }}</span> 
      </div>
    @endif

    <div class=" min-h-screen max-w-screen-xl mx-auto px-4 py-4 md:py-7 ">
        <div class=" col-span-3 text-center text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r to-cyan-900 from-sky-400 font-mono mb-3 ">Your Found Items</div>
        <div class=" grid grid-cols-1 md:grid-cols-3 gap-3 mb-3 md:mb-8">
           
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

            <div id="{{ $foundItem->id }}" class="found-item-card w-full max-w-md bg-gray-500 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <div class=" ">
                    <img src="{{ $foundItem->photo }}" alt="" class=" w-full h-48 object-cover ">
                </div>
                <div class=" p-2 sm:p-4 md:p-6">
                    <div class="flex items-center justify-between mb-4 md:mb-6">
                        <h5 class="text-md font-bold leading-none text-gray-100">{{ auth()->user()->name }}</h5>
                        <h5 class=" text-sm font-semibold leading-none text-gray-100 ">reported at - {{ $foundItem->created_at->format('d-m-Y')}}</h5>
                    </div>
                    <div class="flex flex-col">
                        <p class="text-md mb-2 
                          text-gray-100">Item name - {{ $foundItem->item_name }}</p>
                        <p class="text-md mb-2 
                         text-gray-100">Category - {{ $foundItem->category->category_name }}</p>
                        <p class="text-md mb-3
                         text-gray-100">Location Found - {{ $foundItem->location->location_name}}</p>
                        
                         <div class=" flex justify-between items-center pt-1">
                            <p class="text-md mb-1
                            text-gray-100">
                               Date Found - {{ $foundItem->date_found->format('d-m-Y') }}
                               </p>      
                               <button type="button" class="report-del-btn hover:scale-95 hover:bg-orange-700 text-white bg-orange-600  font-medium rounded-lg text-sm px-2.5 py-2 text-center me-2 mb-2">
                                   <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class=" size-5">
                                       <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                     </svg>
                                     
                               </button>
                         </div>
                          
                           
                     
                                  
                    </div>
                </div>
              
            </div>
            @endforeach
            
        </div>
        <div class=" mb-3 text-lg-center font-semibold flex justify-center">
            {{ $foundItems->links() }}
        </div>
        <div class="  text-center text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r to-cyan-900 from-sky-400 font-mono mt-5 mb-8 ">Your Lost Items</div>
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

                <div id="{{ $lostItem->id }}" class="lost-item-card w-full max-w-md p-2 bg-gray-500 border border-gray-200 rounded-lg shadow sm:p-5 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex items-center justify-between mb-4 md:mb-6">
                        <h5 class="text-md font-bold leading-none text-gray-100">{{ auth()->user()->name }}</h5>
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
                          
                         <div class=" flex justify-between items-center pt-4">
                            <a type="button" href="/dashboard/{{ $lostItem->id }}/matches" class="text-gray-200 bg-gray-800 hover:bg-slate-600 hover:scale-95 transition-all hover:text-white font-medium rounded-lg text-md px-4 py-2.5 text-center me-2 mb-2">Find Matches</a> 
                            <button type="button" class="report-del-btn text-white bg-orange-600 hover:scale-95 hover:bg-orange-700  font-medium rounded-lg text-sm px-2.5 py-2 text-center me-2 mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class=" size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                  </svg>
                                  
                            </button>
                         </div>
                              
                    </div>
                </div>
                @endforeach
        </div>
        <div class=" col-span-3 text-lg-center font-semibold flex justify-center">
            {{ $lostItems->links() }}
        </div>
        
    </div>

</x-app-layout>
