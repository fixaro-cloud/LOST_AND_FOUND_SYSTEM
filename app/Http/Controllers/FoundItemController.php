<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoundItem;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FoundItemController extends Controller
{
    
    public function create(){
        return view('report-found-item',[
            'categories' => Category::all(),
            'locations' => Location::all()
        ]);
    }

    public function store(){

        // $location_id = request('location_id'); 
        // dd(request()->all());
        
        $cleanData = request()->validate([
            'item_name' => ['required','max:80'],
            'date_found' => ['required','date','before_or_equal:'. today()],
            'description' => ['required','max:400'],
            'category_id' => ['required',Rule::exists('categories','id')],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png'],
            'question_1' => ['required','max:400'],
            'answer_1' => ['required','max:400'],
            'question_2' => ['required','max:400'],
            'answer_2' => ['required','max:400'] ,
            'location_id' => ['required',Rule::exists('locations','id')]
        ]);

        $cleanData['user_id'] = auth()->user()->id;
        // $cleanData['location_id'] = request('location_id');
        $cleanData['photo'] = '/storage/'. request('photo')->store('/found-items');

        $foundItem = FoundItem::create($cleanData);

        return redirect('/dashboard/'. auth()->user()->id .'/reported-items')->with('found-item-store-success', "Found item has been reported successfully");  

    }
}
