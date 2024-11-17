<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteData extends Model
{
    use HasFactory;
    protected $fillable=['site_name','site_image'];
    public function sheduleTime(){
        return $this->hasMany(SiteData_SheduleTime::class,'site_data_id','id');
    }
}
