<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingDay extends Model
{
    use HasFactory;
    protected $fillable=['day','starting_time','ending_time','setting_id'];

    public function setting(){
        return $this->belongsTo(Setting::class);
    }
}