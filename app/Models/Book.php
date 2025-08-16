<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{

    use HasFactory ,SoftDeletes;
    protected $fillable = [
        'name',
        'author',
        'description',
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
