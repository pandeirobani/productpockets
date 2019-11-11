<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Product;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'account_name', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function participatings()
    {
        return $this->belongsToMany(Product::class,'participate_product','user_id','product_id')->withTimestamps();
    }
    
    public function participate($productId)
    {
        $exist = $this->is_participating($productId);
        
        if($exist) {
            return false;
        } else {
            $this->participatings()->attach($productId);
            return true;
        }
    }
    
    public function unparticipate($productId)
    {
        $exist = $this->is_participating($productId);
        
        if($exist) {
            $this->participatings()->detach($productId);
            return true;
        } else {
            return false;
        }
    }
    
    public function is_participating($productId)
    {
        return $this->participatings()->where('product_id',$productId)->exists();
    }
    
    public function feed_participatings()
    {
        $participating_ids = $this->participatings()->pluck('products.id')->toArray();
        return Product::whereIn('products.id',$participating_ids);
    }
}
