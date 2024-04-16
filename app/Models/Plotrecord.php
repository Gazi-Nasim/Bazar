<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plotrecord extends Model
{
    use HasFactory;
    protected $fillable=['bazar_id','user_id','plot_no','from_date','to_date','type'];
    public function bazar(){
        return $this->belongsTo(Bazar::class,'bazar_id','id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
