<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Template extends BaseModel
{
    use HasFactory;

    public function scopeAllCount($query){

        return $query->count();
        }

        public function scopeLikeColumn($query,$val){

            $query->where('title', 'like', "%$val%");
            $query->orWhere('template', 'like', "%$val%");
            $query->orWhere('meta_title', 'like', "%$val%");
            $query->orWhere('meta_keyword', 'like', "%$val%");
            $query->orWhere('meta_description', 'like', "%$val%");
            return $query->count();
        }

        public function scopeGetResult($query,$val){

            $query->where('title', 'like', "%$val%");
            $query->orWhere('template', 'like', "%$val%");
            $query->orWhere('meta_title', 'like', "%$val%");
            $query->orWhere('meta_keyword', 'like', "%$val%");
            $query->orWhere('meta_description', 'like', "%$val%");

            return $query->get();
        }

}
