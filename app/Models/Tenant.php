<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'balance', 'previous_bill', 'unpaid_bill'
    ];

    // Define the relationship to messages
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}