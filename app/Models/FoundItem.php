<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoundItem extends Model
{
    /** @use HasFactory<\Database\Factories\FoundItemFactory> */
    use HasFactory;
     protected $fillable = ['item_name','date_found','description','category_id','photo','user_id','question_1','answer_1','question_2','answer_2','location_id'];

     protected $casts = [
      'date_found' => 'date'
     ];
     
     public function category(){
        return $this->belongsTo(Category::class);
     }

     public function user(){
        return $this->belongsTo(User::class);
     }

     public function lostItems(){
         return $this->belongsToMany(LostItem::class, 'found_item_lost_item','found_item_id','lost_item_id');
     }

     public function location(){
         return $this->belongsTo(Location::class);
     }


}
