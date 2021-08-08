<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable = [
        'name', 'email', 'phone', 'address', 'note', 'status', 'order_total', 'users_id',
    ];

    // public function details() {
    //     return $this->hasMany(OrderDetail::class,'order_id', 'id');
    // }
}
