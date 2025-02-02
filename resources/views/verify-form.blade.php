@props(['lostItem','foundItem'])

<x-app-layout>


    <div class=" min-h-screen max-w-screen-xl mx-auto  px-32 py-2 md:py-7 bg-slate-400">

<form class="max-w-ful bg-slate-400 shadow-2xl py-4 pt-8 px-5 rounded-lg " action="/dashboard/{{ $lostItem->id }}/matches/{{ $foundItem->id }}/verify" method="POST">
    @csrf
    <h1 class=" text-2xl font-semibold text-center mb-10 -mt-2">Verification Process for "{{ $foundItem->item_name }}"</h1>
    <div class="flex justify-center items-center w-full mb-8">
        <div class=" w-4/5">
                     
    <label for="message" class="block mb-2 text-lg font-semibold text-black dark:text-white"> 
        {{ $foundItem->question_1 }}
    </label>
    <textarea  id="message" rows="3" name="answer_1" class="block p-2.5 w-full  resize-none text-lg text-gray-900 bg-slate-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"  ></textarea>
        </div>

    </div>

    <div class="flex justify-center items-center w-full mb-8">
    <div class=" w-4/5">
                     
    <label for="message" class="block mb-2 text-lg font-semibold text-black dark:text-white">
        {{ $foundItem->question_2 }}

    </label>
    <textarea id="message" rows="3" name="answer_2" class="block p-2.5 w-full resize-none text-lg text-gray-900 bg-slate-200 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
        </div>

    </div>

    <div class=" flex justify-center ">
        <button type="submit" class="text-white duration-500 bg-gray-800 w-1/4 hover:bg-gray-700 hover:scale-95  focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-md px-10 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Claim Item</button>
    </div> 
  
 </form>
  
</div>



</x-app-layout>