<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LostItemController extends Controller
{
    public function create(){
        return view('report-lost-item', [
            'categories' => Category::all(),
            'locations' => Location::all()
        ]);
    }

    public function store(){

        // dd(request()->all());
        $cleanData = request()->validate([
            'item_name' => ['required','max:80'],
            'date_lost' => ['required','date','before_or_equal:'. today()],
            'description' => ['required','max:400'],
            'category_id' => ['required',Rule::exists('categories','id')],
            'location_id' => ['required',Rule::exists('locations','id')]
        ]);

        $cleanData['user_id'] = auth()->user()->id;
        
        $lostItem = LostItem::create($cleanData);

        return redirect('/dashboard/'. auth()->user()->id .'/reported-items')->with('lost-item-store-success', "Lost item has been reported successfully");
    }
}
