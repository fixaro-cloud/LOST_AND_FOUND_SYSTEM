@props(['locations'])

<x-admin-layout>
    <div class=" min-h-screen  max-w-screen-xl mx-auto px-4 py-4 md:py-7 bg-slate-200">
        <h1 class=" text-2xl font-semibold text-center mb-5 -mt-2">Location Management</h1>

        <form class="relative mb-3" action="" method="GET">
            {{-- @csrf --}}
            <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" name="location_name" class="block p-2 py-2.5 ps-10 text-sm text-gray-900 border border-gray-50 rounded-lg w-80 bg-white focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for locations">
            {{-- <button type="submit" class=" d-none"></button> --}}
        </form>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">
            <table class="w-full text-md text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-md font-semibold text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                       
                        <th scope="col" class="px-6 py-3">
                            Location Name
                        </th>
                        <th scope="col" class=" px-7 py-3 ">
                            Parent Location
                        </th>
                        <th scope="col" class=" px-7 py-3 ">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                   @foreach ($locations as $location)
                   <tr id="{{ $location->id }}" class="location odd:bg-gray-100 odd:dark:bg-gray-900 even:bg-gray-300 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                  
                    <td class="px-6 py-4 text-gray-900 font-medium">
                        {{ $location->location_name }}
                      </td> 
                    <td class="px-6 py-4 text-gray-900 font-medium">
                      Lorem ipsum dolor sit amet consectetur
                    </td> 
                    <td class=" px-4 py-4 flex gap-3  items-center">
                        <form action="/locations/create" method="GET" class="">
                            @csrf
                            <button type="submit" class="user-add-btn text-white bg-green-600 hover:bg-blue-500 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-xl text-md px-3.5 py-1 text-center me-3 mb-2 dark:focus:ring-blue-900">Add</button>
                        </form>
                   
                            <button type="submit" class="user-del-btn text-white bg-orange-600 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-xl text-md px-2.5 py-1 text-center me-3 mb-2 dark:focus:ring-yellow-900">Delete</button>
       
                    </td>
                </tr>
        
                 @endforeach
                </tbody>
            </table>
         
        </div>
        <div class="text-lg-center font-semibold mt-4 flex justify-center">
            {{ $locations->links() }}
        </div>
    </div>
</x-admin-layout>