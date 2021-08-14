<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticate;

class Customer extends Authenticate
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'name', 'email', 'password', 'phone', 'address'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function order_list(){
        return $this->hasMany(Orders::class,'id','customer_id');
    }
}
