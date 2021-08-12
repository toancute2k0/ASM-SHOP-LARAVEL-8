<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $fillable = [
        'name', 'image_category', 'status', 'priority', 'slug',
    ];

    //JON 1 -n đếm từ trang danh mục qua product
    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id')->where('status', 1);
    }

    public function product_cate() {
        return $this->hasMany(Product::class);
    }
}
