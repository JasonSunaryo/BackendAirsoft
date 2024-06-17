<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StockLog extends Model
{
    protected $fillable = ['product_id', 'change'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
