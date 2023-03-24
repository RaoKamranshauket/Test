<?php

namespace App\Models;

use App\Models\product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cart extends Model
{
    use HasFactory;
    protected  $table='_carts';
    protected  $primaryKey='id';

    public function products()
    {
        return $this->belongsTo(product::class, 'pro_id', 'id');
    }
}
