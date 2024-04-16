<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazilla extends Model
{
    use HasFactory;
    protected $table='upazillas';
    protected $fillable=['name'];
    public function application()
    {
        return $this->hasMany(Application::class,'upazilla_id','id');
    }
    public function bazar()
    {
        return $this->hasMany(Bazar::class,'bazar_id','id');
    }
}
