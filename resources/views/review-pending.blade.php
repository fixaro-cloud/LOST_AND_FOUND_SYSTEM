<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
  
        <nav class="fixed top-0 z-50 w-full bg-slate-300 border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <div class="px-3 py-3 lg:px-5 lg:pl-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                  <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                      <span class="sr-only">Open sidebar</span>
                      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                         <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                      </svg>
                   </button>
               
                    <span class="self-center font-semibold text-xl md:text-3xl lg:text-4xl whitespace-nowrap dark:text-white ml-4">
                        <a href="{{ route('dashboard') }}" class="  font-bold text-transparent bg-clip-text bg-gradient-to-r to-red-500 from-sky-400 ">
                            Lost & Found
                        </a>
                    </span>
                 
                </div>
                {{-- <a class="relative flex h-8.5 w-8.5 items-center justify-center rounded-full border-[0.5px] border-stroke bg-gray hover:text-primary dark:border-strokedark dark:bg-meta-4 dark:text-white" href="#" @click.prevent="dropdownOpen = ! dropdownOpen; notifying = false">
                    <span :class="!notifying &amp;&amp; 'hidden'" class="absolute -top-0.5 right-0 z-1 h-2 w-2 rounded-full bg-meta-1 hidden">
                      <span class="absolute -z-1 inline-flex h-full w-full animate-ping rounded-full bg-meta-1 opacity-75"></span>
                    </span>
        
                    <svg class="fill-current duration-300 ease-in-out" width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M16.1999 14.9343L15.6374 14.0624C15.5249 13.8937 15.4687 13.7249 15.4687 13.528V7.67803C15.4687 6.01865 14.7655 4.47178 13.4718 3.31865C12.4312 2.39053 11.0812 1.7999 9.64678 1.6874V1.1249C9.64678 0.787402 9.36553 0.478027 8.9999 0.478027C8.6624 0.478027 8.35303 0.759277 8.35303 1.1249V1.65928C8.29678 1.65928 8.24053 1.65928 8.18428 1.6874C4.92178 2.05303 2.4749 4.66865 2.4749 7.79053V13.528C2.44678 13.8093 2.39053 13.9499 2.33428 14.0343L1.7999 14.9343C1.63115 15.2155 1.63115 15.553 1.7999 15.8343C1.96865 16.0874 2.2499 16.2562 2.55928 16.2562H8.38115V16.8749C8.38115 17.2124 8.6624 17.5218 9.02803 17.5218C9.36553 17.5218 9.6749 17.2405 9.6749 16.8749V16.2562H15.4687C15.778 16.2562 16.0593 16.0874 16.228 15.8343C16.3968 15.553 16.3968 15.2155 16.1999 14.9343ZM3.23428 14.9905L3.43115 14.653C3.5999 14.3718 3.68428 14.0343 3.74053 13.6405V7.79053C3.74053 5.31553 5.70928 3.23428 8.3249 2.95303C9.92803 2.78428 11.503 3.2624 12.6562 4.2749C13.6687 5.1749 14.2312 6.38428 14.2312 7.67803V13.528C14.2312 13.9499 14.3437 14.3437 14.5968 14.7374L14.7655 14.9905H3.23428Z" fill=""></path>
                    </svg>
                  </a> --}}
        
                  {{-- <div x-show="dropdownOpen" class="absolute right-48 mt-2.5 flex h-90 w-75 flex-col rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark sm:right-0 sm:w-80" style="">
                    <div class="px-6 py-3">
                      <h5 class="text-sm font-medium text-bodydark2">Notification</h5>
                    </div>
        
                    <ul class="flex h-auto flex-col overflow-y-auto">
                      <li>
                        <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4" href="#">
                          <p class="text-sm">
                            <span class="text-black dark:text-white">Edit your information in a swipe</span>
                            Sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim.
                          </p>
        
                          <p class="text-xs">12 May, 2025</p>
                        </a>
                      </li>
                      <li>
                        <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4" href="#">
                          <p class="text-sm">
                            <span class="text-black dark:text-white">It is a long established fact</span>
                            that a reader will be distracted by the readable.
                          </p>
        
                          <p class="text-xs">24 Feb, 2025</p>
                        </a>
                      </li>
                      <li>
                        <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4" href="#">
                          <p class="text-sm">
                            <span class="text-black dark:text-white">There are many variations</span>
                            of passages of Lorem Ipsum available, but the majority have
                            suffered
                          </p>
        
                          <p class="text-xs">04 Jan, 2025</p>
                        </a>
                      </li>
                      <li>
                        <a class="flex flex-col gap-2.5 border-t border-stroke px-4.5 py-3 hover:bg-gray-2 dark:border-strokedark dark:hover:bg-meta-4" href="#">
                          <p class="text-sm">
                            <span class="text-black dark:text-white">There are many variations</span>
                            of passages of Lorem Ipsum available, but the majority have
                            suffered
                          </p>
        
                          <p class="text-xs">01 Dec, 2024</p>
                        </a>
                      </li>
                    </ul>
                  </div> --}}
        
                <div class="flex items-center mr-2">
                    <div class="flex items-center ms-3 gap-3 lg:gap-7">
        
        
                      <button id="dropdownNotificationButton" data-dropdown-toggle="dropdownNotification" class="relative inline-flex items-center text-sm bg-slate-500 p-[0.25rem] rounded-md  font-medium text-center text-gray-500 hover:text-gray-900  focus:outline-none dark:hover:text-white dark:text-gray-400" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-7">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                        </svg>
                        
                        
                        <div class="absolute block w-3 h-3 bg-red-500 border-2 border-white rounded-full -top-0.5 -end-0.5 dark:border-gray-900"></div>
                        </button>
                        
                        <!-- Dropdown menu -->
                        <div id="dropdownNotification" class="z-20 hidden w-full h-100 overflow-scroll max-w-sm  bg-slate-100 divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-800 dark:divide-gray-700" aria-labelledby="dropdownNotificationButton">
                          <div class=""></div>
                          <div class="block px-4 py-2 font-medium text-center text-gray-700 rounded-t-lg bg-gray-200 dark:bg-gray-800 dark:text-white">
                              Notifications
                          </div>
                          <div class="divide-y divide-gray-100 dark:divide-gray-700">
                          
                            <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                              <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-3.jpg" alt="Bonnie image">
                                <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-red-600 border border-white rounded-full dark:border-gray-800">
                                  <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M17.947 2.053a5.209 5.209 0 0 0-3.793-1.53A6.414 6.414 0 0 0 10 2.311 6.482 6.482 0 0 0 5.824.5a5.2 5.2 0 0 0-3.8 1.521c-1.915 1.916-2.315 5.392.625 8.333l7 7a.5.5 0 0 0 .708 0l7-7a6.6 6.6 0 0 0 2.123-4.508 5.179 5.179 0 0 0-1.533-3.793Z"/>
                                  </svg>
                                </div>
                              </div>
                              <div class="w-full ps-3">
                                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Bonnie Green</span> and <span class="font-medium text-gray-900 dark:text-white">141 others</span> love your story. See it and view more stories.</div>
                                  <div class="text-xs text-blue-600 dark:text-blue-500">44 minutes ago</div>
                              </div>
                            </a>
                            <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                              <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-4.jpg" alt="Leslie image">
                                <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-green-400 border border-white rounded-full dark:border-gray-800">
                                  <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                                    <path d="M18 0H2a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h2v4a1 1 0 0 0 1.707.707L10.414 13H18a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5 4h2a1 1 0 1 1 0 2h-2a1 1 0 1 1 0-2ZM5 4h5a1 1 0 1 1 0 2H5a1 1 0 0 1 0-2Zm2 5H5a1 1 0 0 1 0-2h2a1 1 0 0 1 0 2Zm9 0h-6a1 1 0 0 1 0-2h6a1 1 0 1 1 0 2Z"/>
                                  </svg>
                                </div>
                              </div>
                              <div class="w-full ps-3">
                                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Leslie Livingston</span> mentioned you in a comment: <span class="font-medium text-blue-500" href="#">@bonnie.green</span> what do you say?</div>
                                  <div class="text-xs text-blue-600 dark:text-blue-500">1 hour ago</div>
                              </div>
                            </a>
                            <a href="#" class="flex px-4 py-3 hover:bg-gray-100 dark:hover:bg-gray-700">
                              <div class="flex-shrink-0">
                                <img class="rounded-full w-11 h-11" src="/docs/images/people/profile-picture-5.jpg" alt="Robert image">
                                <div class="absolute flex items-center justify-center w-5 h-5 ms-6 -mt-5 bg-purple-500 border border-white rounded-full dark:border-gray-800">
                                  <svg class="w-2 h-2 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                    <path d="M11 0H2a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h9a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm8.585 1.189a.994.994 0 0 0-.9-.138l-2.965.983a1 1 0 0 0-.685.949v8a1 1 0 0 0 .675.946l2.965 1.02a1.013 1.013 0 0 0 1.032-.242A1 1 0 0 0 20 12V2a1 1 0 0 0-.415-.811Z"/>
                                  </svg>
                                </div>
                              </div>
                              <div class="w-full ps-3">
                                  <div class="text-gray-500 text-sm mb-1.5 dark:text-gray-400"><span class="font-semibold text-gray-900 dark:text-white">Robert Brown</span> posted a new video: Glassmorphism - learn how to implement the new design trend.</div>
                                  <div class="text-xs text-blue-600 dark:text-blue-500">3 hours ago</div>
                              </div>
                            </a>
                          </div>
                          <a href="#" class="block py-2 text-sm font-medium text-center text-gray-900 rounded-b-lg bg-gray-50 hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-white">
                            <div class="inline-flex items-center ">
                              <svg class="w-4 h-4 me-2 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 14">
                                <path d="M10 0C4.612 0 0 5.336 0 7c0 1.742 3.546 7 10 7 6.454 0 10-5.258 10-7 0-1.664-4.612-7-10-7Zm0 10a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z"/>
                              </svg>
                                View all
                            </div>
                          </a>
                        </div>
                        
                      <div>
        
                        <button type="button" class="flex text-xl rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                            <div class="flex items-center gap-1">
                                <img class="w-11 h-11 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-5.jpg" alt="user photo">
                            <span class="">{{ auth()->user()->name }}</span>
                            </div>
                          
                        </button>
                      </div>
                      <div class="z-50 hidden my-4 text-base list-none md:w-56 bg-slate-300 divide-y divide-gray-100 rounded shadow-lg dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                        <div class="px-4 py-3" role="none">
                          <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                            {{ auth()->user()->email }}
                          </p>
                        </div>
                        <ul class="py-1" role="none">
                        
                            
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-md font-semibold text-gray-700 hover:bg-gray-300 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Your Profile</a>
                          </li>
                         
                          <li>
                            <form action="/logout" method="post" class="block px-4 py-2 text-md font-semibold text-gray-700 hover:bg-gray-300 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white">
                                @csrf
                                <button type="submit" class="block" role="menuitem">
                                    Log Out
                                </button>
                            </form>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </nav>

          <div class=" h-24"></div>

    <div class=" min-h-screen bg-slate-300">
        <h1 class=" text-center text-2xl bg-[#399091]  text-white px-3 py-4">The Verification Process has been completed. <br>  Please Wait for the Admin's review to be finalized.</h1>
       
        <div class=" mt-12 flex justify-center" >
            <div class=" w-1/3 bg-slate-400 shadow-lg p-4 rounded-xl">
                    <h1 class=" text-2xl text-center">"Click the link below to return to your dashboard."</h1>
                    <div class=" mt-4 flex justify-center">
                        <a href="/dashboard" class="font-semibold text-2xl text-blue-600 underline dark:text-blue-500 hover:no-underline">Return to Dashboard</a> 
                    </div>
                    
            </div>
        </div>

    </div>
 

        
        <script type="module" src="/js/main.js"></script>
        {{-- <script type="module" src="/node_modules/flowbite/dist/flowbite.min.js"></script> --}}
    </body>
</html>
