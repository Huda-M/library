<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrow extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'book_id',
        'user_id',
        'status',
        'borrow_date',
        'return_date',
        'actual_return_date'
    ];

    protected $dates = ['deleted_at'];
    public function book()
    {
        return $this->belongsTo(Book::class)->withTrashed();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

