<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk_model extends Model
{
    //
    Protected $table = 'produk';
    Protected $fillable = ['nama','kategori','harga','stok'];
}
