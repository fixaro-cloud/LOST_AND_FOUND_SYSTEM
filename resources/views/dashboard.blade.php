<x-app-layout>

    @if (session()->has('login_success'))
    <div class="p-4 mb-4 position-absolute text-lg text-center text-white  bg-color1 dark:bg-gray-200 dark:text-blue-400" role="alert">
        <span class=" font-medium  ">{{ session('login_success') }}</span> 
      </div>
    @endif
 
   

    <div class=" min-h-screen  max-w-screen-xl mx-auto px-4 py-4 md:py-7 ">

      <section class="">
        <div class=" grid grid-cols-7 gap-2 md:gap-4 mb-3 md:mb-6">
          <div class=" col-span-7 md:col-span-4 ">
              <div class=" bg-slate-200 px-5  pt-10 pb-8">
                  <h1 class=" text-xl md:text-3xl mb-3 md:mb-6">"Lost Something? Tell Us!"</h1>
                  <p class=" mb-5 md:mb-12 text-lg md:text-xl">Don’t worry, we’ve got your back! Use this feature to tell us what you’ve lost, where it might be, and any other details that can help us find it.</p>
                  <a href="/report-lost-item"  type="button" class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                  
                    Report Lost Item
                    </a>
              </div>
          </div>
          <div class=" col-span-6 md:col-span-3">
            <div class="">
              <img class=" object-cover object-bottom" src="{{ URL('/photos/report_lost_item.jpg') }}" alt="">
           </div>
          </div>
        </div>

        <div class=" grid grid-cols-7 gap-2 md:gap-4">
          <div class=" col-span-6 md:col-span-3">
            <div class="">
              <img class=" object-cover object-bottom" src="{{ URL('/photos/report_found_item.jpg') }}" alt="">
              {{-- <img class=" object-cover object-bottom" src="{{ auth()->user()->foundItems()->first()->photo }}" alt=""> --}}
           </div>
          </div>
          <div class=" col-span-7 md:col-span-4">
              <div class=" bg-slate-200 px-5  pt-10 pb-14">
                  <h1 class=" text-xl md:text-3xl mb-3 md:mb-6">"Found Something? Let Us Know!"</h1>
                  <p class=" mb-5 md:mb-12 text-lg md:text-xl"> Be a hero and help it find its way home! Use this feature to let us know what you’ve found and where you found it.</p>
                  <div class=" text-center">
                    <a href="/report-found-item" type="button" class="text-white  bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-lg px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                  
                      Report Found Item
                      </a>
                  </div>
             
              </div>
          </div>
         
        </div>
      </section>

     
    </div>



</x-app-layout>
