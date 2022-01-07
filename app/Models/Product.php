<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends BaseModel
{
    use HasFactory;

    public function scopeAllCount($query){

        return $query->count();
        }
    
        public function scopeLikeColumn($query,$val){
    
            $query->where('product_name', 'like', "%$val%");
            $query->orWhere('product_price', 'like', "%$val%");
            $query->orWhere('product_tag', 'like', "%$val%");
            $query->orWhere('product_description', 'like', "%$val%");
            $query->orWhere('product_category', 'like', "%$val%");
            return $query->count();
        }
    
        public function scopeGetResult($query,$val){
    
            $query->where('product_name', 'like', "%$val%");
            $query->orWhere('product_price', 'like', "%$val%");
            $query->orWhere('product_tag', 'like', "%$val%");
            $query->orWhere('product_description', 'like', "%$val%");
            $query->orWhere('product_category', 'like', "%$val%");
            
            return $query->get();
        }
        public function CategoryName(){

            return $this->belongsTo('App\Models\Category', 'product_category')->select('category_name');
        }
}
