<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
  protected $primaryKey='id';
  protected $fillable = ['order_id','product_id','size','quantity','fine_detail'];


  public function product()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }



}
