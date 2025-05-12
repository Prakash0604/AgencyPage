<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable=['logo','title','email','address','contact','description','work_description','facebook_url','twitter_url','github_url','instagram_url','about_us_description','footer_description'];
}
