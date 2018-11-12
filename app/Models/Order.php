<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   	protected $fillable = [
        'id_user', 'name', 'address', 'phone', 'description', 'shipping', 'total', 'date', 'status', 'created_at', 'updated_at'
    ];
}
