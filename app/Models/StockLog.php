<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'change',
        'profit',
    ];

    public function report()
    {
        return $this->belongsTo(Report::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
