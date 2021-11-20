<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdersProduct extends Model
{
  protected $primaryKey='id';
  protected $fillable = ['order_id','product_id','startDate','endDate','size','quantity'
                        ,'status','image' ,'late','tracking_no','other_fine','fine_detail'];


  public function product()
    {
        return $this->belongsTo(Products::class,'product_id','id');
    }



}
