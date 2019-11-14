<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product_comment;

class Product extends Model
{
    protected $fillable = ['name','leader_name','status','deadline'];
    
    public function participants()
    {
        return $this->belongsToMany(User::class,'participate_product','product_id','user_id')->withTimestamps();
    }
    
    public function product_comments()
    {
        return $this->hasMany(Product_comment::class);
    }
    
   
}
