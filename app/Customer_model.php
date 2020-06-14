<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer_model extends Model
{
    //
    Protected $table = 'customer';
    Protected $fillable = ['nama', 'alamat', 'email', 'telp'];
}
