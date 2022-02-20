<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends BaseModel
{
    use HasFactory;

    public function scopeAllCount($query){

        return $query->count();
        }
    
        public function scopeLikeColumn($query,$val){
    
            $query->where('name', 'like', "%$val%");
            $query->orWhere('designation', 'like', "%$val%");
            $query->orWhere('title', 'like', "%$val%");
            $query->orWhere('description', 'like', "%$val%");
            return $query->count();
        }
    
        public function scopeGetResult($query,$val){
    
            $query->where('name', 'like', "%$val%");
            $query->orWhere('designation', 'like', "%$val%");
            $query->orWhere('title', 'like', "%$val%");
            $query->orWhere('description', 'like', "%$val%");
            return $query->get();
        }
}
