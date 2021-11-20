<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
  protected $primaryKey = 'id';
  public $incrementing = false;
  //protected $casts = [ 'id' => 'string' ];
  protected $keyType = 'string';
  protected $fillable = [
      'id','user_id','billing_name','billing_surname','billing_address','billing_province',
      'billing_district','billing_sub_district','billing_pincode','billing_phone',
      'bank_name','account_name','account_no',
      'bank','billing_subtotal','billing_deposit','billing_refund','billing_total','delivery_op','status','image'
  ];

  public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function ordersproduct()
      {
          return $this->hasMany(OrdersProduct::class,'order_id','id');
      }





}
