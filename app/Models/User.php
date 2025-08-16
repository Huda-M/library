<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'email',
        'password',
        'phone',
        'photo',
        'address',
        'last_name',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }

public function borrows()
{
    return $this->hasMany(Borrow::class);
}
public function borrowedBooks()
{
    return $this->belongsToMany(Book::class, 'borrows', 'user_id', 'book_id')
                ->withTrashed() // تضمين الكتب المحذوفة
                ->withPivot('status', 'borrow_date', 'return_date', 'actual_return_date')
                ->withTimestamps();
}
// User.php
public function activeBorrowedBooks()
{
    return $this->belongsToMany(Book::class, 'borrows', 'user_id', 'book_id')
                ->wherePivot('status', 'borrowed')
                ->withPivot('status', 'borrow_date', 'return_date', 'actual_return_date')
                ->withTimestamps();
}
}
