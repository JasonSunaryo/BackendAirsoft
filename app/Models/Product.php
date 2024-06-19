<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'cost_price',
        'price',
        'stock',
        'type',
        'description',
        'image',
    ];

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class);
    }
}
