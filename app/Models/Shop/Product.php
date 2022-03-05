<?php

namespace App\Models\Shop;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $guarded = [];

public function vendor()
{
    return $this->hasOne(User::class, 'id', 'user_id');
}

public function images(){
    $StrImages = $this->images;
    $images = explode(',',$StrImages);
    if($images !== null){
        foreach($images as $image){
            $AllImages[]=asset('uploads/products/' . $image);
        }
    }
    return $AllImages;
}

public function thumbnail(){
    $StrImages = $this->images;
    $ArrayImages = explode(',',$StrImages);
    $image=$ArrayImages[0];
    return ($image !== null) ? asset('uploads/products/' . $image) : "";
}

public function category()
{
    return $this->belongsTo(Category::class,'category_id','id');
}

public function cartitems()
{
    return $this->belongsToMany(CartItem::class, 'product_id');
}

public function getActive(){
    return   $this -> is_published == '1' ? __('admin/globale.desible')  :  __('admin/globale.enable') ;
}
}
