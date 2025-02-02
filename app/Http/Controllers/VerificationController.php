<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use App\Models\LostItem;
use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function show(LostItem $lostItem, FoundItem $foundItem){
        // dd("{$lostItem->id} and {$foundItem->id}");
        return view("verify-form", [
            "lostItem" => $lostItem,
            "foundItem" => $foundItem
        ]);
    }

    public function store(LostItem $lostItem, FoundItem $foundItem){
        $cleanData = request()->validate([
            "answer_1" => ['required','max:200'],
            "answer_2" => ['required','max:200']
        ]);

        $exists = $foundItem->lostItems()->wherePivot('lost_item_id', $lostItem->id)->exists();

        if($exists){
            return redirect('/verification-error');
        }


        $foundItem->lostItems()->attach($lostItem->id,[
            'answer_1' => $cleanData['answer_1'],
            'answer_2' => $cleanData['answer_2'],
            'claimed_user_name' => User::find($lostItem->user_id)->name,
            'lost_item_name' => $lostItem->item_name,
            'found_item_name' => $foundItem->item_name
        ]);
      
        return redirect('/review-pending');
    }

    public function showReviewPending(){
        return view('review-pending');
    }


    public function showVerifyError(){
        return view('verification-error');
    }

}
