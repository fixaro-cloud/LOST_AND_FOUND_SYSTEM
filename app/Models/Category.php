<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['category_name'];

    public function lostItems(){
        return $this->hasMany(LostItem::class);
    }

    public function foundItems(){
        return $this->hasMany(FoundItem::class);
    }
}
