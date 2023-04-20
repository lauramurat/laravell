<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{


    use HasFactory;

    protected $fillable = ['role_kz', 'role_en', 'role_ru'];

    public function users(){
        return $this->hasMany(User::class);
    }
}
