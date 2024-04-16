<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    // protected $fillable=['user_id', 'upazilla_id', 'bazar_id', 'plot_no', 'plot_type', 'plot_area', 'rights', 'time', 'north', 'south', 'east', 'west', 'application_type', 'name', 'mobile', 'father_or_husband', 'shang', 'post', 'nid_no', 'photo', 'nid_photo', 'record_papers', 'survey_report', 'serveyor_id', 'report_date', 'status', 'remarks', 'payment_amount', 'payment_status', 'trans_id' ];

    protected $guarded = ['id'];
    public function upazilla()
    {
        return $this->belongsTo(Upazilla::class, 'upazilla_id', 'id');
    }
    public function bazar()
    {
        return $this->belongsTo(Bazar::class, 'bazar_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function serveyor()
    {
        return $this->belongsTo(User::class, 'serveyor_id', 'id');
    }
    public function papers()
    {
        return $this->hasMany(Paper::class, 'application_id', 'id');
    }
}
