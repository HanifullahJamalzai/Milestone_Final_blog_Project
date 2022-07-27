<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    
    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    // یعنی هر پست میتواند چندین کمنت داشته باشد
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    

    // کتگوری مربوط پست است
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    public function tags(){
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

}
