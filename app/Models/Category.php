<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = ['name', 'status'];
    // 1 nhieu
    public function products(){
        return $this->hasMany(Product::class, 'category_id','id');
    }

    // them localScope cho tim kiem
    public function scopeSearch($query){
        if($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
