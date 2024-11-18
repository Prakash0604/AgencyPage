<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable=['title','category_id','description','created_by','updated_by','status'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function postImages(){
        return $this->hasMany(PostImage::class,'post_id','id');
    }

    public function createdBy(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function updatedBy(){
        return $this->belongsTo(User::class,'updated_by','id');
    }
}
