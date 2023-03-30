<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
    public function products()
    {
     return $this->belongsTo(product::class,'pro_id','id');
    }
}
