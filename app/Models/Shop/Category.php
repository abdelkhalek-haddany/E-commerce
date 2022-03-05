<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="categories";
    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('is_published', 1);
    }

    public function scopeSelection($query)
    {

        return $query->select('id', 'name', 'slug', 'photo', 'is_published', 'parent_id');
    }

    public function thumbnail()
    {

        return ($this->photo !== null) ? asset('uploads/categories/' .$this->photo) : "";

    }

    public function getActive()
    {
        return $this->is_published == '1' ? __('admin/globale.desible')  :  __('admin/globale.enable') ;

    }

    public function vendors()
    {
        return $this->hasMany(Vendor::class, 'category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id','id');
    }

    // public function orders()
    // {
    //     return $this->belongsToMany(Orders::class, 'category_orders');
    // }

}
