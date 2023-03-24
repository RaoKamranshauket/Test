<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table="order_items";
    protected $primaryKey="id";
    protected $fillable=[
        'order_id',
  'pro_id',
  'qty',
  'price',
    ];
}
