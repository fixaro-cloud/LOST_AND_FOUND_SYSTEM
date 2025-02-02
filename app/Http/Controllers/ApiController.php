<?php

namespace App\Http\Controllers;

use App\Models\FoundItem;
use App\Models\LostItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ApiController extends Controller
{
    public function deleteLostItem(LostItem $lostItem){
            $lostItem->forceDelete();

            return response()->json([
                "message" => "lost item has been deleted successfully"
            ],200);
    }

    public function deleteFoundItem(FoundItem $foundItem){
        $path = public_path($foundItem->photo);

        $foundItem->forceDelete();

        File::delete($path);

        return response()->json([
            "message" => "found item has been deleted successfully"
        ],200);
    }

    // public function destroyUser(User $user){
    //     $user->forceDelete();

    //     return response()->json([
    //         "message" => "User has been deleted successfully"
    //     ],200);
    // }
}
