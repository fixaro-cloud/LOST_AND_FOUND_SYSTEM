{{-- @props(['notifications'])

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
                    @if ($notification->data['recipient_type'] === 'loser')
                    <div class=" flex justify-between items-center mb-1">
                        <div class="text-lg font-serif">{{ $notification->data['status'] === 'approve' ? "Approved on" : "Rejected at" }}: {{ $notification->created_at->format('d-m-Y')}}</div>
                        <a href="/chatify/{{ $notification->data['founder_id'] }}" class="font-semibold text-lg text-blue-600 underline dark:text-blue-500 hover:no-underline">Contact to Founder</a> 
                    </div>
                    @else
                    <div class=" flex justify-between items-center mb-1">
                        <div class="text-lg font-serif">Approve on: {{ $notification->created_at->format('d-m-Y')}}</div>
                        <a href="/chatify/{{ $notification->data['claimer_id'] }}" class="font-semibold text-lg text-blue-600 underline dark:text-blue-500 hover:no-underline">Contact to Loser</a> 
                    </div>
                    @endif
                   
                </div>
                
                <form action="/notifications/{{ $notification->id }}/mark-as-read" class="">
                    <button type="submit" class="text-white bg-green-900 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-lg  text-md px-3.5 py-1.5 text-center me-3 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Mark As Read</button> 
                </form>
             
            
            </div>
            @endforeach     
        </div>
    </div>
</x-app-layout> --}}
@props(['notifications'])

<x-app-layout>
    <div class="min-h-screen max-w-screen-xl mx-auto px-4 py-4 md:py-7">
        <div class="text-center text-3xl font-bold text-black font-mono mb-5">Notifications</div>

        <div class="notification-container">
            {{-- No Notifications UI --}}
            @if ($notifications->isEmpty())
                <div class="text-center text-3xl font-bold">
                    <div class="flex justify-center">
                        <div class="w-3/5 flex items-center bg-gray-200 shadow-lg mt-7 p-5 rounded-lg">
                            <p class="font-mono text-2xl">You don't have any notifications yet.</p>
                            <img src="/logo/not-found.png" alt="No Notifications" class="w-40 ml-5">
                        </div>
                    </div>
                </div>
            @endif

            {{-- Loop through notifications --}}
            @foreach ($notifications as $notification)
                @php
                    $isRejected = $notification->data['status'] === 'reject';
                    $isLoser = $notification->data['recipient_type'] === 'loser';
                @endphp

                <div class="w-4/5 mx-auto mb-6 p-5 shadow-lg rounded-lg 
                            {{ $isRejected ? 'bg-red-100 border border-red-400' : 'bg-slate-300' }}">
                    
                    {{-- Notification Message --}}
                    <div class="text-lg font-serif font-semibold {{ $isRejected ? 'text-red-900' : 'text-black' }}">
                        {{ $notification->data['message'] }}
                    </div>

                    {{-- Item Name --}}
                    <div class="mt-2 text-md font-serif font-semibold">
                        🏷️ Item: {{ $notification->data['item_name'] }}
                    </div>

                    {{-- Founder Name (only for approved notifications) --}}
                    @if (!$isRejected)
                        <div class="mt-2 flex justify-between items-center">
                            <div class="text-md font-serif font-semibold">
                                👤 {{ $isLoser ? "Founder" : "Loser" }}: {{ $isLoser ? $notification->data['founder_name'] : $notification->data['claimer_name'] }}
                            </div>
                            <a href="/chatify/{{ $isLoser ? $notification->data['founder_id'] : $notification->data['claimer_id'] }}" 
                               class="font-semibold text-lg text-blue-600 underline dark:text-blue-500 hover:no-underline mb-4">
                                ✉️{{ $isLoser ? "Contact Founder" : "Contact Loser" }}
                            </a>
                        </div>
                    @else
                        {{-- Loser Name (only for rejected notifications) --}}
                       
                    @endif

                    {{-- Approval / Rejection Details --}}
                    <div class="mt-2 flex justify-between items-center">
                        <div class="text-lg font-serif {{ $isRejected ? 'text-red-700' : 'text-green-800' }}">
                            {{ $isRejected ? '❌ Request Rejected on:' : '✅ Approved on:' }} {{ $notification->created_at->format('d-m-Y') }}
                        </div>

                        {{-- Mark as Read Button --}}
                        <form action="/notifications/{{ $notification->id }}/mark-as-read">
                            <button type="submit" class="text-white {{ $isRejected ? 'bg-red-600 hover:bg-red-500' : 'bg-green-900 hover:bg-green-800' }} 
                                focus:outline-none focus:ring-4 focus:ring-opacity-50 font-medium rounded-lg text-md px-4 py-2 text-center">
                                Mark As Read
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach     
        </div>
    </div>
</x-app-layout>
