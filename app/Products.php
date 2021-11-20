<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey='id';
    protected $fillable=['p_name','categories_id','p_code','p_color','description','price','image'];

    public function category(){
           return $this->belongsTo(Category::class,'categories_id','id');
       }
    public function attributes(){
           return $this->hasMany(ProductAtrr::class,'products_id','id');
       }
      
}
