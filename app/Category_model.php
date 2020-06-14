<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category_model extends Model
{
    //
    Protected $table = 'kategori';
    Protected $fillable = ['nama_kategori', 'ket'];
}
