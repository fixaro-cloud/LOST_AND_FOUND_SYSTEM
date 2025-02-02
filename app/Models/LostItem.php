<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    /** @use HasFactory<\Database\Factories\LostItemsFactory> */
    use HasFactory;

    protected $fillable = ['item_name','location','date_lost','description','category_id','user_id','location_id'];

    protected $casts = [
        "date_lost" => 'date'
    ];
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function foundItems(){

    return $this->belongsToMany(FoundItem::class, 'found_item_lost_item', 'lost_item_id', 'found_item_id');
    
    }

    public function location(){
        return $this->belongsTo(Location::class);
    }

}
