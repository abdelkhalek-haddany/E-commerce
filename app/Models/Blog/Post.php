<?php

namespace App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    protected $table = "posts";
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_posts');
    }

    public function getActive()
    {
        return $this->is_published == '1' ? __('admin/globale.desible')  :  __('admin/globale.enable') ;

    }
    public function thumbnail()
    {

        return ($this->thumbnail !== null) ? asset('uploads/posts/' .$this->thumbnail) : "";

    }
}
