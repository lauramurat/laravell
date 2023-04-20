<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;

    protected $fillable = ['opinion', 'user_id',  'cosmetic_id', 'img'];

    public function cosmetic(){
        return $this->belongsTo(Cosmetic::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
