<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoundItemLostItem extends Model
{

    protected $table = "found_item_lost_item";
    protected $fillable = ['answer_1','answer_2','claimed_user_name','lost_item_name','found_item_name'];


}
