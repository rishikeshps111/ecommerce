<?php

namespace App\Models;

use App\Models\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable

{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'user_type',
        'password'
    ];
    public function user(){
        return $this->hasOne(Cart::class,'user_id','id');
    }
}
