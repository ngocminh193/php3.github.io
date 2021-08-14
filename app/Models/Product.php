<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'desc',
        'price',
        'sale_price',
        'desc',
        'quantity',
        'category_id',
        'image',
    ];
    //1 -1
public function cat(){
    return $this->hasOne(Category::class, 'id', 'category_id');
}
public function scopeSearch($query){
    if($key = request()->key){
        $query = $query->where('name','like','%'.$key.'%');
    }
    return $query;
}
}
