<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bazar extends Model
{
    use HasFactory;
    protected $fillable=[
        'upazilla_id',
        'name'
    ];
    public function upazilla()
    {
        return $this->belongsTo(Upazilla::class,'upazilla_id','id');
    }
    public function application()
    {
        return $this->hasMany(Application::class,'bazar_id','id');
    }
    public function records()
    {
        return $this->hasMany(Plotrecord::class,'bazar_id','id');
    }
}
