<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'blog';
    protected $fillable = [
        'name', 	'slug', 	'image', 	'summary', 	'description', 	'status', 	'users_id',
    ];

    public function BlogUser() {
        return $this->hasOne(User::class, 'id', 'users_id');
    }
}
