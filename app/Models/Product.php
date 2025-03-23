<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product'; // Table name

    protected $primaryKey = 'product_id'; // Primary key

    protected $fillable = [
        'product_name',
        'size',
        'category',
        'types',
        'description',
        'cost_price',
        'sell_price',
        'stock',
        'image',
        'supplier_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id', 'supplier_id');
    }
}
