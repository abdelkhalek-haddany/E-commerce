<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Vendor extends Model
{
    use Notifiable;

    protected $table = 'vendors';

    protected $guarded = [];
    protected $hidden = ['category_id', 'password'];


    public function scopeActive($query)
    {

        return $query->where('active', 1);
    }

    public function getLogoAttribute($val)
    {
        return ($val !== null) ? asset('uploads/vendors/' . $val) : "";
    }

    public function scopeSelection($query)
    {
        return $query->select('id', 'category_id', 'active', 'name', 'address', 'email', 'logo', 'mobile');
    }

    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public function orders()
    {
        return $this->belongsToMany(Orders::class, 'vendor_orders');
    }

    public function getActive()
    {
        return $this->active == 1 ? 'enable' : 'desible';

    }
    
    public function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}
