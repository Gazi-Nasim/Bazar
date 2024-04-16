<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    use HasFactory;
    protected $fillable=['application_id','title','file_name','type'];
    public function application(){
        return $this->belongsTo(Application::class,'application_id','id');
    }
}
