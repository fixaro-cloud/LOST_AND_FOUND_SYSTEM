<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use App\Models\FoundItemLostItem;
use App\Models\LostItem;
use App\Models\User;
use App\Notifications\ReviewApprovedNotification;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        return view('admin-dashboard');
    }
    public function showReview(){

        $matches = FoundItemLostItem::paginate(10);

        return view('admin-dashboard-reviews', [
            'matches' => $matches
        ]);
    }

    public function showUserManagement(){

        $users = User::paginate(10);

        return view('admin-dashboard-user-management',[
            'users' => $users
        ]);
    }

    public function suspendUser(User $user){

        $user->update(['status' => 'suspended']);

        return redirect()->back()->with('suspend-success', 'User suspended successfully.');
    }

    public function activateUser(User $user){

        $user->update(['status' => 'active']);

        return redirect()->back()->with('activate-success', 'User activated successfully.');

    }

    public function approveReview(LostItem $lostItem, FoundItem $foundItem){

        $review = FoundItemLostItem::where('lost_item_id',$lostItem->id)->where('found_item_id',$foundItem->id)->first();

        $claimer = User::where('id',$lostItem->user_id)->first();
        $founder = User::where('id',$foundItem->user_id)->first();

        if ($claimer) {
            $claimer->notify(new ReviewApprovedNotification($review, $claimer, $founder));
        }
        if ($founder) {
            $founder->notify(new ReviewApprovedNotification($review, $claimer, $founder));
        }

        return redirect()->back()->with('success', 'Review approved and notifications sent.');

    }


}
