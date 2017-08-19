<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Product extends Model
{
    protected $fillable=['name','desc','size','price','amount','category_id','img'];

    public function category()
    {
      return $this->belongsTo(Category::class);
    }
}
