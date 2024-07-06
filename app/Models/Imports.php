<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imports extends Model
{
    use HasFactory;
    protected $fillable = [
        'import_id', 'import_type', 'import_date', 'import_path'
    ];
}