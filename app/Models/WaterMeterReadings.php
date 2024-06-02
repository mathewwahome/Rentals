<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterMeterReadings extends Model
{
    use HasFactory;
    protected $fillable = [
        'date', 'month','no_clients','status','current_m_readings','previous_m_readings','total_m_readings','action','id','Name'
    ];
}
