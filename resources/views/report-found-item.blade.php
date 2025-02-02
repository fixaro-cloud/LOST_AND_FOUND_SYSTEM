@props(['categories','locations'])

<x-app-layout>

<div class=" min-h-screen max-w-screen-xl mx-auto bg-slate-200  px-32 py-2 md:py-7 ">

<h1 class=" text-3xl font-semibold text-center mb-2 -mt-2">Report What You Found</h1>
<form class=" max-w-full bg-slate-400 py-6 pt-10 px-10" action="/report-found-item/store"        method="POST" enctype="multipart/form-data">
    @csrf
    <div class="grid md:grid-cols-2 md:gap-6 font-semibold mb-3">
        <div class="relative col-span-2 z-0 w-full mb-5 group">
            <input type="text" value="{{ old('item_name') }}"  name="item_name" id="item_name" class="block py-2.5 px-0 w-full text-gray-900 bg-transparent border-0 border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-500 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer text-md" placeholder=" " required />
            
            <label for="item_name" class="peer-focus:font-medium absolute text-md text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Item Name</label>
            @error('item_name')
            <div class="text-red-600 text-md">{{ $message }}</div>
           @enderror
        </div>

       
    </div>

   
      <div class="relative z-0 w-full mb-5 group">
        <label for="" class=" text-md text-gray-700  duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-semibold">Date Found</label>
        <input type="date" value="{{ old('date_found') }}" name="date_found" id="date_found" class="block py-3.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        @error('date_found')
        <div class="text-red-600 text-md">{{ $message }}</div>
      @enderror
      
        
    </div>
 
    <div class="grid md:grid-cols-5  items-center font-semibold mb-3">
      <div class="relative z-0 w-full mb-5 group col-span-3">
        
        <label for="description" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Item Description</label>
        <textarea  id="description" name="description" rows="3" class="block p-2.5 w-full text-md text-gray-900 bg-gray-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" placeholder="Write item description here..."> {{ old('description') }}</textarea>
        @error('description')
        <div class="text-red-600 text-md">{{ $message }}</div>
       @enderror
    
      </div>

      <div class="relative z-0 w-full mb-5 ms-4 group col-span-2">
        {{-- <input type="text" value="{{ old('location') }}" name="location" id="location" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-600 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
      
        <label for="location" class="peer-focus:font-medium absolute text-md text-gray-700 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Location</label> --}}
        
       <!-- Select -->
<select data-hs-select='{
  "hasSearch": true,
  "searchPlaceholder": "Search...",
  "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
  "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
  "placeholder": "Select the Location found",
  "toggleTag": "<button type=\"button\" aria-expanded=\"false\"><span class=\"me-2\" data-icon></span><span class=\"text-gray-800 dark:text-neutral-200 \" data-title></span></button>",
  "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
  "dropdownClasses": "mt-2 max-h-72 pb-1 px-1 space-y-0.5 z-20 w-full bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
  "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
  "optionTemplate": "<div><div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div class=\"text-gray-800 dark:text-neutral-200 \" data-title></div></div></div>",
  "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
}' class="" name="location_id" id="location_id">

<option ></option>
@foreach ($locations as $location)
            
<option value="{{ $location->id }}"  {{ old('location_id') == $location->id ? 'selected' : '' }} >{{ $location->location_name }}</option>

@endforeach
  
</select>
<!-- End Select -->
  
    
    @error('location_id')
    <div class="text-red-600 text-md">{{ $message }}</div>
   @enderror
  </div>

    </div>
 
  


    <div class="relative z-0 w-full mb-4 group">
     
        <select id="category_id" name="category_id" class="bg-gray-100 border border-gray-300 text-gray-900 text-md rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-3/5 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option selected>Choose a category</option>
            @foreach ($categories as $category)
            
                <option value="{{ $category->id }}"  {{ old('category_id') == $category->id ? 'selected' : '' }} >{{ $category->category_name }}</option>
                
            @endforeach
 
        </select>
              @error('category_id')
              <div class="text-red-600 text-md">{{ $message }}</div>
            @enderror

    </div>



    <div class="relative z-0 w-full mb-6 group">
      <label class="block mb-2 text-md font-medium text-gray-900 dark:text-white" for="photo">Upload Item photo</label>
      <input class="block w-3/5 text-md text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-300 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="photo" id="photo"  type="file" accept="image/png, image/jpeg, image/jpg">  
      @error('photo')
      <div class="text-red-600 text-md">{{ $message }}</div>
      @enderror    
    </div>

    <div class=" flex justify-center">
      <label for="description" class="block mb-2 text-lg font-medium text-black dark:text-white">Please fill the following fields for verification process!</label>
    </div>


    <div class="relative z-0 w-full mb-1 group"> 
      <div class=" flex gap-4 justify-between items-center">
        <div class="relative z-0 w-full mb-3 group">      
          <label for="question_1" class="block mb-1 text-md font-medium text-gray-900 dark:text-white">Question 1</label>
          <textarea  id="question_1" name="question_1" rows="2" class="block p-2.5 w-full text-md text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" > {{ old('description') }}</textarea>
          @error('question_1')
          <div class="text-red-600 text-md">{{ $message }}</div>
         @enderror
      </div>
    
      <div class="relative z-0 w-full mb-3 group">      
        <label for="answer_1" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Answer 1</label>
        <textarea  id="answer_1" name="answer_1" rows="2" class="block p-2.5 w-full text-md text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" placeholder="Write item description here..."> {{ old('description') }}</textarea>
        @error('question_1')
        <div class="text-red-600 text-md">{{ $message }}</div>
       @enderror
    </div>
    
      </div>     
    </div>
    
    <div class="relative z-0 w-full mb-1 group"> 
      <div class=" flex gap-4 justify-between items-center">
        <div class="relative z-0 w-full mb-3 group">      
          <label for="question_2" class="block mb-1 text-md font-medium text-gray-900 dark:text-white">Question 2</label>
          <textarea  id="question_2" name="question_2" rows="2" class="block p-2.5 w-full text-md text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" placeholder="Write item description here..."> {{ old('description') }}</textarea>
          @error('question_1')
          <div class="text-red-600 text-md">{{ $message }}</div>
         @enderror
      </div>
    
      <div class="relative z-0 w-full mb-3 group">      
        <label for="answer_2" class="block mb-2 text-md font-medium text-gray-900 dark:text-white">Answer 2</label>
        <textarea  id="answer_2" name="answer_2" rows="2" class="block p-2.5 w-full text-md text-gray-900 bg-gray-300 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 resize-none" placeholder="Write item description here..."> {{ old('description') }}</textarea>
        @error('question_1')
        <div class="text-red-600 text-md">{{ $message }}</div>
       @enderror
    </div>
    
      </div>     
    </div>

   <div class=" text-center">
    <button type="submit" class="py-2.5 px-7 me-2 bg-transparent mb-2 text-md font-medium text-black focus:outline-none rounded-lg border border-2  border-gray-900  hover:bg-gray-700 hover:text-gray-100 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 mt-8">Submit</button>
   </div>
    
  </form>


    </div>

</x-app-layout>