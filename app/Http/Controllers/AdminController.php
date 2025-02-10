<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoundItem;
use App\Models\FoundItemLostItem;
use App\Models\Location;
use App\Models\LostItem;
use App\Models\User;
use App\Notifications\ReviewApprovedNotification;
use App\Notifications\ReviewRejectedNotification;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index(){
        return view('admin-dashboard');
    }
    public function showReview(){

        $matches = FoundItemLostItem::paginate(6);

        return view('admin-dashboard-reviews', [
            'matches' => $matches
        ]);
    }

    public function showUserManagement(){

        $users = User::paginate(6);

        if(request('user_name')){
            $users = User::where('name','like','%'.request('user_name').'%')->paginate(6);
        }

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
            $claimer->notify(new ReviewApprovedNotification($review, $claimer, $founder,'approve'));
        }
        if ($founder) {
            $founder->notify(new ReviewApprovedNotification($review, $claimer, $founder, 'approve'));
        }

        return redirect()->back()->with('success', 'Review approved and notifications sent.');

    }

    public function rejectReview(LostItem $lostItem, FoundItem $foundItem){

        $review = FoundItemLostItem::where('lost_item_id',$lostItem->id)->where('found_item_id',$foundItem->id)->first();

        $claimer = User::where('id',$lostItem->user_id)->first();
        $founder = User::where('id',$foundItem->user_id)->first();

        if ($claimer) {
            $claimer->notify(new ReviewRejectedNotification($review, $claimer, $founder, 'reject'));
        }

        return redirect()->back()->with('reject', 'Review rejected and notifications sent.');

    }


    public function showLocation(){

        $locations = Location::paginate(6);

        if(request('location_name')){

            $locations = Location::where('location_name','like','%'.request('location_name').'%')->paginate(6);

        }

        return view('admin-dashboard-locations',[
            'locations' => $locations
        ]);
    }

    public function showCategory(){

        $categories = Category::paginate(6);

        if(request('category_name')){

            $categories = Category::where('category_name','like','%'.request('category_name').'%')->paginate(6);
        }
        
        return view('admin-dashboard-category',[
            'categories' => $categories
        ]);
    }


}
