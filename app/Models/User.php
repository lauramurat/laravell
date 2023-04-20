<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',
        'is_active',
        'payment',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function cosmetics(){
        return $this->hasMany(Cosmetic::class);
    }
    public function opinions(){
        return $this->hasMany(Opinion::class);
    }

    public function role(){
        return $this->belongsTo(Role::class);
    }
    public function categories(){
        return $this->hasMany(Category::class);
    }

    public function cosmeticsRated(){
        return $this->belongsToMany(Cosmetic::class)
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function cosmeticsBought(){
        return $this->belongsToMany('cart')
            ->withTimestamps()
            ->withPivot('quantity', 'status');
    }

    public function cosmeticsWithStatus($status){
        return $this->belongsToMany(Cosmetic::class, 'cart')
            ->wherePivot('status', $status)
            ->withTimestamps()
            ->withPivot('quantity', 'status');
    }
    public function cosmeticsInCart(){
        return $this->belongsToMany(Cosmetic::class)
            ->withPivot('quantity', 'status')
            ->withTimestamps();
    }
}
