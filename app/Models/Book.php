<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'author',
        'description',
        'user_id',
        'available_copies',
        'category_id',
        'price',
        'publish_year',
        'photo',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
public function borrows()
{
    return $this->hasMany(Borrow::class);
}
}
