<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAtrr extends Model
{
    protected $primaryKey='id';
    protected $fillable=['products_id','sku','size','stock'];
}
