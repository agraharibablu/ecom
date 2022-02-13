<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends BaseModel
{
    use HasFactory;

    public function scopeAllCount($query){

        return $query->count();
        }
    
        public function scopeLikeColumn($query,$val){
    
            $query->where('name', 'like', "%$val%");
            return $query->count();
        }
    
        public function scopeGetResult($query,$val){
    
            $query->where('name', 'like', "%$val%");
            return $query->get();
        }
}
