<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;
    protected $table='wish_lists';
    protected $primaryKey='id';
    public function products()
    {
        return $this->belongsTo(product::class, 'pro_id', 'id');
    }

}
