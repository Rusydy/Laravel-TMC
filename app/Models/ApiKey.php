<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiKey extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $fillable = [
        'key',
    ];

    public static function generateKey()
    {
        return Str::random(40); // You can adjust the length of the key as needed
    }
}
