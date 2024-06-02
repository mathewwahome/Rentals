<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaterBills extends Model
{
    use HasFactory;
    protected $fillable = ['payment_date', 'amount', 'house_no','client_id'];
}
