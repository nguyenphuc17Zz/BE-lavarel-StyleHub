<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // /** @use HasFactory<\Database\Factories\UserFactory> */
    // use HasFactory, Notifiable;

    // /**
    //  * The attributes that are mass assignable.
    //  *
    //  * @var list<string>
    //  */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var list<string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * Get the attributes that should be cast.
    //  *
    //  * @return array<string, string>
    //  */
    // protected function casts(): array
    // {
    //     return [
    //         'email_verified_at' => 'datetime',
    //         'password' => 'hashed',
    //     ];
    // }

    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    // 1 user có 1 profile
    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    // 1 user có nhiều orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // 1 user có 1 cart
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }

    // 1 user có nhiều chats
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
}
