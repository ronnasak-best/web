<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $primaryKey='id';
    protected $fillable=['users_id','name','surname','address','province','district'
    ,'sub_district','pincode','default','mobile','txtBank','account_name','account_no'];
}
