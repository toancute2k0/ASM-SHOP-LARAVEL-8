<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'slug',
        'image',
        'price',
        'sale_price',
        'description',
        'status',
        'priority',
        'category_id',
    ];
    public function images(){
        return $this->hasMany(Images::class);
    }

    //JON 1 -1
    public function cate() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    // đếm jon 2 khoá ngoại
    public function details() {
        return $this->hasMany(OrderDetail::class,'product_id', 'id');
    }
    // local Scope(or GlobalScope) search page shop
    // public function scopeSearch($query) {
    //     if($key = request()->key) {
    //         $query = $query->where('name', 'like', '%'.$key.'%');
    //     }
    //     return $query;
    // }
    // đếm product
    public function product_total() {
        return $this->hasOne(Product::class, 'id');
    }
}
