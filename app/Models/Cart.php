<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Cart extends Pivot
{
    use HasFactory;
    protected $table = 'cart';

    protected $fillable = ['cosmetic_id', 'user_id', 'quantity', 'status', 'category_id'];

    public function cosmetic(){
        return $this->belongsTo(Cosmetic::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
