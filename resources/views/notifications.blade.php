@props(['notifications'])

<x-app-layout>
    <div class=" min-h-screen max-w-screen-xl mx-auto px-4 py-4 md:py-7 ">
        <div class="text-center text-3xl font-bold text-black font-mono mb-5 ">Notifications</div>
        <div class="notification-container">
            <div class="hidden last:block  text-center text-3xl font-bold"> 
                <div class="flex justify-center">
                    <div class=" w-3/5 flex items-center bg-gray-200 shadow-lg mt-7">
                        <div class=" w-80 pt-4 ps-2">
                            <p class=" font-mono text-2xl ">You don't have any notifications yet.</p>
                        </div>
                        <div class="">
                            <img src="/logo/not-found.png" alt="" class=" w-80">
                        </div>
                        
                    </div>
                  
                </div>
            </div>

            @foreach ($notifications as $notification)
            <div class=" w-4/5 bg-slate-300 shadow-lg rounded-lg mx-auto mb-6 flex justify-around  items-center py-3">
                <div class="">
                    <div class=" text-lg font-serif mb-1">{{ $notification->data['message'] }}</div>
                    <div class=" flex justify-between items-center mb-[0.43rem]">
                        <div class="text-md font-serif font-semibold">Item Name: {{ $notification->data['item_name'] }}</div>
                        @if ($notification->data['recipient_type'] === 'loser')
                        <div class="text-md font-serif font-semibold">Founder Name: {{ $notification->data['founder_name'] }}</div>
                        @else
                        <div class="text-md font-serif font-semibold">Loser Name: {{ $notification->data['claimer_name'] }}</div>
                        @endif
                    </div>
                    <div class=" flex justify-between items-center mb-1">
                        <div class="text-lg font-serif">Approved on: {{ $notification->data['approved_at']}}</div>
                        <a href="#" class="font-semibold text-lg text-blue-600 underline dark:text-blue-500 hover:no-underline">Contact to Founder</a> 
                    </div>
                   
                </div>
                
                <form action="/notifications/{{ $notification->id }}/mark-as-read" class="">
                    <button type="submit" class="text-white bg-green-900 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg  text-md px-3.5 py-1.5 text-center me-3 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Mark As Read</button> 
                </form>
             
            
            </div>
            @endforeach     
        </div>
    </div>
</x-app-layout>