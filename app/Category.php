<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primaryKey='id';
    protected $fillable=['parent_id','name','description','status'];
}
