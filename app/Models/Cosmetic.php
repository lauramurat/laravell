<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosmetic extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_kz',
        'name_ru',
        'name_en',
        'composition_kz',
        'composition_ru',
        'composition_en',
        'price',
        'category_id',
        'user_id',
        'img'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function opinions(){
        return $this->hasMany(Opinion::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function usersRated(){
        return $this->belongsToMany(User::class)
            ->withPivot('rating')
            ->withTimestamps();
    }

    public function usersBought(){
        return $this->belongsToMany('cart')
            ->withTimestamps()
            ->withPivot('quantity', 'status');
    }

    public function usersWithStatus($status){
        return $this->belongsToMany(User::class, 'cart')
            ->wherePivot('status', $status)
            ->withTimestamps()
            ->withPivot('quantity', 'status');
    }

    public function usersInCart(){
        return $this->belongsToMany(User::class)
            ->withPivot('quantity', 'status')
            ->withTimestamps();
    }



}
