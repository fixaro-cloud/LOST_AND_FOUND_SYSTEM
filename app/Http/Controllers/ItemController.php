<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use App\Models\LostItem;
use App\Models\User;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index(){
        return view('all-repored-items',[
            'foundItems' => FoundItem::paginate(6),
            'lostItems' => LostItem::paginate(6)
        ]);
    }
    public function show(User $user){
        return view('user-reported-items',[
            'lostItems' => $user->lostItems()->latest()->paginate(3),
            'foundItems' => $user->foundItems()->latest()->paginate(3)
        ]);
    }

    public function match(LostItem $lostItem){

        // dd($lostItem->date_lost->addDays(25));

        $potentialFoundItems = FoundItem::where('category_id', $lostItem->category_id)
        ->whereDate('date_found', '>=', $lostItem->date_lost) // Matches within 7 days before
        ->whereDate('date_found', '<=', $lostItem->date_lost->addDays(30)) // Matches within 7 days after
        ->get();

        $matchedFoundItems = $potentialFoundItems->filter(function ($foundItem) use ($lostItem) {
                $nameSimilarity = 0;
                $locationSimilarity = 0;

                // Calculate similarity for item_name
                similar_text($lostItem->item_name, $foundItem->item_name, $nameSimilarity);

                // Calculate similarity for location
                similar_text($lostItem->location, $foundItem->location, $locationSimilarity);

                // Define similarity thresholds
                return $nameSimilarity >= 60 && $locationSimilarity >= 60;
            });


        return view('item-matches',[
            "matchedFoundItems" => $matchedFoundItems,
            "lostItem" => $lostItem
        ]) ;   
     
    }

}
