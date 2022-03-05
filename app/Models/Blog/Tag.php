<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Blog\Post;

class Tag extends Model
{
    use HasFactory;
    protected $table = 'tags';

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'tag_posts');
    }

    public function getActive()
    {
        return $this->is_published == '1' ? __('admin/globale.enable')  :  __('admin/globale.desible') ;

    }
}
