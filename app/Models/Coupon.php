<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends BaseModel
{
    use HasFactory;

    public function scopeAllCount($query){

        return $query->count();
        }
    
        public function scopeLikeColumn($query,$val){
    
            $query->where('name', 'like', "%$val%");
            $query->orWhere('code', 'like', "%$val%");
            $query->orWhere('term_condition', 'like', "%$val%");
            return $query->count();
        }
    
        public function scopeGetResult($query,$val){
    
            $query->where('name', 'like', "%$val%");
            $query->orWhere('code', 'like', "%$val%");
            $query->orWhere('term_condition', 'like', "%$val%");
            return $query->get();
        }
}
