<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    // Allow mass assignment for these attributes
    protected $fillable = ['tenant_id', 'message'];

    // Define the relationship to the Tenant model
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
