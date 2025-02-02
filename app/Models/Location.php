<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function lostItems(){
        return $this->hasMany(LostItem::class);
    }

    public function foundItems(){
        return $this->hasMany(FoundItem::class);
    }   
}
