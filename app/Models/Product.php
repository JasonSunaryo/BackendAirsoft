<?php
 
 namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'cost_price',
        'price',
        'stock',
        'type',
        'description',
        'image', // Menambahkan image ke fillable
    ];

    public function stockLogs()
    {
        return $this->hasMany(StockLog::class);
    }
}
