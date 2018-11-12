<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $fillable = [
        'id_order', 'id_product', 'id_dog', 'price', 'quantity', 'amount', 'created_at', 'updated_at'
    ];
}
