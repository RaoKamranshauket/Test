<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primaryKey='id';

    public function fetchCat()
    {
         return $this->belongsTo(Category::class, 'cate_id', 'id');
    }
}
