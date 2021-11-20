<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $primaryKey='id';
    protected $fillable=['products_id','image'];
}
